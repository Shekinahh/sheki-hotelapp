<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use App\Models\Apartment\Apartment;
use App\Models\Hotel\Hotel;
use App\Models\Booking\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class HotelsController extends Controller
{
    /**
     * Display all rooms or rooms for a specific hotel.
     */
    public function rooms(Request $request, $id = null)
    {
        $hotel = null;
        $query = Apartment::with('hotel')->orderBy('id', 'desc');

        if ($id) {
            $hotel = Hotel::findOrFail($id);
            $query->where('hotel_id', $id);
        }

        if ($request->filled('guests')) {
            $query->where('max_persons', '>=', (int) $request->guests);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->max_price);
        }

        $getRooms = $query->paginate(9);
        $hotels = Hotel::all();

        return view('hotels.rooms', compact('getRooms', 'hotel', 'hotels'));
    }

    /**
     * Display specific room details.
     */
    public function roomDetails($id)
    {
        $getRoom = Apartment::with('hotel')->findOrFail($id);
        $relatedRooms = Apartment::where('id', '!=', $id)
            ->where('hotel_id', $getRoom->hotel_id)
            ->take(3)
            ->get();

        if ($relatedRooms->isEmpty()) {
            $relatedRooms = Apartment::where('id', '!=', $id)->take(3)->get();
        }

        return view('hotels.roomdetails', compact('getRoom', 'relatedRooms'));
    }

    /**
     * Process room reservation request.
     */
    public function roomBooking(Request $request, $id)
    {
        $room = Apartment::findOrFail($id);
        $hotel = Hotel::find($room->hotel_id);
        $hotelName = $hotel ? $hotel->name : "Shekinah Luxury Suites";

        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|string|max:30',
            'check_in'     => 'required|date|after_or_equal:today',
            'check_out'    => 'required|date|after:check_in',
        ]);

        $checkIn  = new DateTime($request->check_in);
        $checkOut = new DateTime($request->check_out);
        $days = (int) $checkIn->diff($checkOut)->days;

        if ($days <= 0) {
            return back()->withErrors(['check_out' => 'Check-out date must be after check-in date.'])->withInput();
        }

        // Check availability
        $conflict = Booking::where('room_name', $room->name)
            ->where('status', '!=', 'Cancelled')
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                      ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('check_in', '<=', $request->check_in)
                            ->where('check_out', '>=', $request->check_out);
                      });
            })
            ->exists();

        if ($conflict) {
            return back()->withErrors(['check_in' => 'This suite is already reserved for the selected dates. Please select other dates or another suite.'])->withInput();
        }

        $pricePerDay = (float) $room->price;
        $totalPrice  = $days * $pricePerDay;

        $booking = Booking::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'check_in'     => $request->check_in,
            'check_out'    => $request->check_out,
            'duration'     => $days,
            'price'        => $totalPrice,
            'user_id'      => Auth::id(),
            'room_name'    => $room->name,
            'hotel_name'   => $hotelName,
            'status'       => 'Confirmed',
        ]);

        session()->put('current_booking_id', $booking->id);
        session()->put('total_price', $totalPrice);
        session()->put('booked_room_name', $room->name);
        session()->put('booked_hotel_name', $hotelName);
        session()->put('booked_check_in', $request->check_in);
        session()->put('booked_check_out', $request->check_out);
        session()->put('booked_duration', $days);

        return redirect()->route('hotel.pay')->with('success', 'Reservation initiated successfully! Complete your booking below.');
    }

    /**
     * Show Payment / Checkout screen.
     */
    public function paywithpaypal()
    {
        $bookingId = session()->get('current_booking_id');
        $booking = null;

        if ($bookingId) {
            $booking = Booking::find($bookingId);
        }

        if (!$booking && Auth::check()) {
            $booking = Booking::where('user_id', Auth::id())->latest()->first();
        }

        return view('hotels.pay', compact('booking'));
    }

    /**
     * Process simulated payment / confirmation.
     */
    public function processPayment(Request $request)
    {
        $bookingId = $request->input('booking_id') ?? session()->get('current_booking_id');

        if ($bookingId) {
            $booking = Booking::find($bookingId);
            if ($booking) {
                $booking->update(['status' => 'Confirmed']);
            }
        }

        session()->forget(['current_booking_id', 'total_price']);

        return redirect()->route('user.bookings')->with('success', 'Payment successful! Your luxury reservation has been confirmed.');
    }

    /**
     * User's My Bookings dashboard.
     */
    public function myBookings()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Please log in to view your reservations.');
        }

        $bookings = Booking::where('user_id', Auth::id())
            ->orWhere('email', Auth::user()->email)
            ->orderBy('id', 'desc')
            ->get();

        return view('hotels.my-bookings', compact('bookings'));
    }

    /**
     * Cancel an existing booking.
     */
    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);

        if (Auth::check() && ($booking->user_id == Auth::id() || $booking->email == Auth::user()->email)) {
            $booking->update(['status' => 'Cancelled']);
            return back()->with('success', 'Reservation #' . $booking->id . ' has been cancelled.');
        }

        return back()->with('error', 'Unauthorized action.');
    }
}