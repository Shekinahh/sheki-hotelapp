@extends('layouts.app')

@section('content')
<section class="py-5 bg-dark text-white text-center">
    <div class="container py-3">
        <span class="badge bg-warning text-dark fw-bold mb-2 text-uppercase">Secure Luxury Checkout</span>
        <h1 class="display-5 fw-bold mb-2">Finalize Your Reservation</h1>
        <p class="text-secondary mx-auto" style="max-width: 550px;">
            Review your reservation details below and choose your preferred payment method to guarantee your stay.
        </p>
    </div>
</section>

<section class="sheki-section bg-light">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <!-- Left Column: Payment Methods -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
                    <h3 class="h4 mb-4"><i class="fa fa-credit-card text-warning me-2"></i> Select Payment Option</h3>

                    <!-- Payment Tabs -->
                    <ul class="nav nav-pills nav-fill mb-4 p-1 bg-light rounded-pill" id="paymentTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill fw-bold" id="paypal-tab" data-bs-toggle="pill" data-bs-target="#paypal" type="button" role="tab">
                                <i class="fab fa-paypal me-2 text-primary"></i> PayPal
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold" id="card-tab" data-bs-toggle="pill" data-bs-target="#card" type="button" role="tab">
                                <i class="fa fa-credit-card me-2 text-warning"></i> Credit / Debit Card
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="paymentTabContent">
                        <!-- PayPal Option -->
                        <div class="tab-pane fade show active text-center py-4" id="paypal" role="tabpanel">
                            <div class="p-4 border rounded-3 bg-light mb-4">
                                <i class="fab fa-paypal fa-3x text-primary mb-3"></i>
                                <h5 class="fw-bold mb-1">Fast & Secure PayPal Checkout</h5>
                                <p class="text-secondary small mb-3">You will complete your luxury booking securely via PayPal or Credit Card.</p>
                                <div class="badge bg-success-subtle text-success px-3 py-2">
                                    <i class="fa fa-lock me-1"></i> End-to-End 256-Bit SSL Encrypted
                                </div>
                            </div>

                            <form action="{{ route('hotel.pay.process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $booking ? $booking->id : session('current_booking_id') }}">
                                <button type="submit" class="sheki-btn-gold w-100 py-3 fs-5 shadow">
                                    <i class="fab fa-paypal me-2"></i> Pay & Confirm with PayPal (${{ number_format($booking ? $booking->price : session('total_price', 450), 2) }})
                                </button>
                            </form>
                        </div>

                        <!-- Credit Card Option -->
                        <div class="tab-pane fade" id="card" role="tabpanel">
                            <form action="{{ route('hotel.pay.process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $booking ? $booking->id : session('current_booking_id') }}">

                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-uppercase text-secondary">Cardholder Name</label>
                                    <input type="text" class="form-control" placeholder="Name on Card" value="{{ $booking ? $booking->name : 'VIP Guest' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-uppercase text-secondary">Card Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fa fa-credit-card text-muted"></i></span>
                                        <input type="text" class="form-control" placeholder="4000 1234 5678 9010" value="4532 8921 4402 1198" required>
                                    </div>
                                </div>

                                <div class="row g-2 mb-4">
                                    <div class="col-6">
                                        <label class="form-label small fw-bold text-uppercase text-secondary">Expiration</label>
                                        <input type="text" class="form-control" placeholder="MM / YY" value="12/28" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-bold text-uppercase text-secondary">CVV</label>
                                        <input type="password" class="form-control" placeholder="123" value="882" maxlength="4" required>
                                    </div>
                                </div>

                                <button type="submit" class="sheki-btn-gold w-100 py-3 fs-5 shadow">
                                    <i class="fa fa-lock me-2"></i> Pay ${{ number_format($booking ? $booking->price : session('total_price', 450), 2) }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Booking Summary -->
            <div class="col-lg-5">
                <div class="sheki-summary-card sticky-top" style="top: 100px;">
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <h4 class="h5 mb-0 fw-bold">Reservation Summary</h4>
                        <span class="badge bg-warning text-dark fw-bold">
                            #{{ $booking ? $booking->id : 'RESERV-01' }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <span class="text-uppercase small text-muted fw-bold d-block">Resort</span>
                        <span class="fw-bold text-dark fs-6">{{ $booking ? $booking->hotel_name : session('booked_hotel_name', "Shekinah Grand Palace & Spa") }}</span>
                    </div>

                    <div class="mb-4">
                        <span class="text-uppercase small text-muted fw-bold d-block">Reserved Suite</span>
                        <span class="fw-bold text-primary fs-6">{{ $booking ? $booking->room_name : session('booked_room_name', "Presidential Oceanfront Suite") }}</span>
                    </div>

                    <div class="sheki-summary-row">
                        <span class="text-secondary"><i class="fa fa-calendar-alt text-warning me-1"></i> Check-in Date:</span>
                        <span class="fw-bold">{{ $booking ? $booking->check_in : session('booked_check_in', date('Y-m-d')) }}</span>
                    </div>

                    <div class="sheki-summary-row">
                        <span class="text-secondary"><i class="fa fa-calendar-check text-warning me-1"></i> Check-out Date:</span>
                        <span class="fw-bold">{{ $booking ? $booking->check_out : session('booked_check_out', date('Y-m-d', strtotime('+3 days'))) }}</span>
                    </div>

                    <div class="sheki-summary-row">
                        <span class="text-secondary"><i class="fa fa-moon text-warning me-1"></i> Stay Duration:</span>
                        <span class="fw-bold">{{ $booking ? $booking->duration : session('booked_duration', 3) }} Nights</span>
                    </div>

                    <div class="sheki-summary-row">
                        <span class="text-secondary">Guest Name:</span>
                        <span class="fw-bold">{{ $booking ? $booking->name : 'VIP Guest' }}</span>
                    </div>

                    <div class="sheki-summary-row">
                        <span class="text-secondary">Concierge & Taxes:</span>
                        <span class="text-success fw-bold">Included (Complimentary)</span>
                    </div>

                    <div class="sheki-summary-row total">
                        <span>Total Balance:</span>
                        <span class="text-warning-emphasis">${{ number_format($booking ? $booking->price : session('total_price', 450), 2) }}</span>
                    </div>

                    <div class="mt-4 pt-3 border-top small text-muted">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <i class="fa fa-check text-success"></i> Free cancellation up to 48 hours before check-in.
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa fa-check text-success"></i> Includes VIP breakfast and 24/7 concierge.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
