<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel\Hotel;
use App\Models\Apartment\Apartment;

class HomeController extends Controller
{
    /**
     * Show the application landing / home dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = Apartment::with('hotel')->orderBy('id', 'desc');

        if ($request->filled('hotel_id')) {
            $query->where('hotel_id', $request->hotel_id);
        }

        if ($request->filled('guests')) {
            $query->where('max_persons', '>=', (int) $request->guests);
        }

        $hotels = Hotel::withCount('apartments')->orderBy('rating', 'desc')->get();
        $rooms = $query->take(6)->get();

        return view('home', compact('hotels', 'rooms'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
