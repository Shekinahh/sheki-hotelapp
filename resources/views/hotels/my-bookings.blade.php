@extends('layouts.app')

@section('content')
<section class="py-5 bg-dark text-white">
    <div class="container py-3">
        <span class="badge bg-warning text-dark fw-bold mb-2 text-uppercase">Guest Concierge Portal</span>
        <h1 class="display-5 fw-bold mb-1">My Reservations & Bookings</h1>
        <p class="text-secondary mb-0">Manage your upcoming luxury stays, past itineraries, and reservation receipts.</p>
    </div>
</section>

<section class="sheki-section bg-light">
    <div class="container">
        @if($bookings->isEmpty())
            <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white">
                <i class="fa fa-calendar-times fa-3x text-muted mb-3"></i>
                <h3 class="h4">No Reservations Found</h3>
                <p class="text-secondary mb-4">You have not reserved any luxury suites yet. Start planning your dream vacation today!</p>
                <div>
                    <a href="{{ route('rooms.all') }}" class="sheki-btn-gold">
                        <i class="fa fa-compass me-1"></i> Browse Luxury Suites
                    </a>
                </div>
            </div>
        @else
            <div class="row g-4">
                @foreach($bookings as $b)
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white h-100">
                            <div class="card-header bg-white border-bottom p-4 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted small text-uppercase fw-bold">Reservation ID</span>
                                    <h5 class="mb-0 fw-bold">#SHEKI-{{ str_pad($b->id, 5, '0', STR_PAD_LEFT) }}</h5>
                                </div>
                                <div>
                                    @if($b->status == 'Confirmed')
                                        <span class="sheki-badge-status sheki-badge-confirmed">
                                            <i class="fa fa-check-circle me-1"></i> Confirmed
                                        </span>
                                    @elseif($b->status == 'Cancelled')
                                        <span class="sheki-badge-status sheki-badge-cancelled">
                                            <i class="fa fa-ban me-1"></i> Cancelled
                                        </span>
                                    @else
                                        <span class="sheki-badge-status sheki-badge-pending">
                                            <i class="fa fa-clock me-1"></i> Pending
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <h4 class="h5 text-dark fw-bold mb-1">{{ $b->room_name }}</h4>
                                    <p class="text-secondary small mb-0"><i class="fa fa-hotel text-warning me-1"></i> {{ $b->hotel_name }}</p>
                                </div>

                                <div class="row g-2 p-3 bg-light rounded-3 mb-3 border">
                                    <div class="col-6">
                                        <small class="text-muted d-block" style="font-size: 0.72rem;">CHECK-IN</small>
                                        <span class="fw-bold text-dark"><i class="fa fa-sign-in-alt text-success me-1"></i> {{ $b->check_in }}</span>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted d-block" style="font-size: 0.72rem;">CHECK-OUT</small>
                                        <span class="fw-bold text-dark"><i class="fa fa-sign-out-alt text-danger me-1"></i> {{ $b->check_out }}</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3 text-secondary small">
                                    <span><i class="fa fa-moon text-warning me-1"></i> {{ $b->duration }} Night(s) Stay</span>
                                    <span>Guest: <strong>{{ $b->name }}</strong></span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                    <div>
                                        <small class="text-muted d-block">Total Paid</small>
                                        <span class="fs-5 fw-bold text-dark">${{ number_format($b->price, 2) }}</span>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="window.print()">
                                            <i class="fa fa-print me-1"></i> Receipt
                                        </button>

                                        @if($b->status != 'Cancelled')
                                            <form action="{{ route('user.bookings.cancel', $b->id) }}" method="POST" onsubmit="return confirm('Are you sure you wish to cancel this luxury reservation?');">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                                    <i class="fa fa-times me-1"></i> Cancel
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
