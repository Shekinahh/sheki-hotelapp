@extends('layouts.app')

@section('content')
<!-- Hero Breadcrumb & Room Title -->
<section class="py-5" style="background: linear-gradient(rgba(15, 23, 42, 0.82), rgba(15, 23, 42, 0.9)), url('{{ asset('assets/images/' . $getRoom->image) }}') center/cover; color: #fff;">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('rooms.all') }}" class="text-warning text-decoration-none">Suites</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">{{ $getRoom->name }}</li>
            </ol>
        </nav>
        <span class="badge bg-warning text-dark fw-bold mb-2 text-uppercase letter-spacing px-3 py-1">
            <i class="fa fa-crown me-1"></i> {{ $getRoom->hotel->name ?? 'Shekinah Resort' }}
        </span>
        <h1 class="text-white display-4 fw-bold mb-2">{{ $getRoom->name }}</h1>
        <p class="text-secondary fs-5 mb-0"><i class="fa fa-map-marker-alt text-danger me-2"></i> {{ $getRoom->hotel->location ?? 'Exclusive Sanctuary' }}</p>
    </div>
</section>

<!-- Main Details & Booking Section -->
<section class="sheki-section bg-light">
    <div class="container">
        <div class="row g-5">
            <!-- Left Column: Details, Photos, Amenities -->
            <div class="col-lg-7">
                <!-- Large Image Showcase -->
                <div class="rounded-4 overflow-hidden shadow-sm mb-4 position-relative" style="height: 420px;">
                    <img src="{{ asset('assets/images/' . $getRoom->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $getRoom->name }}" onerror="this.src='{{ asset('assets/images/room-1.jpg') }}'">
                    <div class="sheki-badge-rating">
                        <i class="fa fa-star"></i> 5.0 (48 Verified Reviews)
                    </div>
                </div>

                <!-- Suite Overview Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-3">
                        <div class="p-3 bg-white rounded-3 shadow-sm text-center border">
                            <i class="fa fa-user-friends text-warning fs-4 mb-2 d-block"></i>
                            <small class="text-muted d-block text-uppercase" style="font-size: 0.7rem;">Capacity</small>
                            <span class="fw-bold text-dark">{{ $getRoom->max_persons }} Guests</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 bg-white rounded-3 shadow-sm text-center border">
                            <i class="fa fa-vector-square text-warning fs-4 mb-2 d-block"></i>
                            <small class="text-muted d-block text-uppercase" style="font-size: 0.7rem;">Size</small>
                            <span class="fw-bold text-dark">{{ $getRoom->size }} m²</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 bg-white rounded-3 shadow-sm text-center border">
                            <i class="fa fa-eye text-warning fs-4 mb-2 d-block"></i>
                            <small class="text-muted d-block text-uppercase" style="font-size: 0.7rem;">View</small>
                            <span class="fw-bold text-dark">{{ $getRoom->view }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 bg-white rounded-3 shadow-sm text-center border">
                            <i class="fa fa-bed text-warning fs-4 mb-2 d-block"></i>
                            <small class="text-muted d-block text-uppercase" style="font-size: 0.7rem;">Beds</small>
                            <span class="fw-bold text-dark">{{ $getRoom->num_beds }} King/Queen</span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-4 p-4 p-md-5 shadow-sm mb-4 border">
                    <h3 class="h4 mb-3">About This Suite</h3>
                    <p class="text-secondary leading-relaxed mb-4">
                        {{ $getRoom->description ?? 'Immerse yourself in unrivaled luxury. This suite was designed by award-winning architectural visionaries, blending natural Italian marble, handcrafted walnut timber, and floor-to-ceiling panoramic glass doors opening to your private balcony.' }}
                    </p>

                    <h4 class="h5 mb-3 pt-3 border-top">Curated Suite Amenities</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-wifi text-warning"></i> High-Speed Ultra Wi-Fi (1Gbps)
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-tv text-warning"></i> 65" 4K OLED Smart TV with Soundbar
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-coffee text-warning"></i> Nespresso Espresso & Artisan Tea Bar
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-bath text-warning"></i> Deep Soaking Tub & Rainfall Shower
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-snowflake text-warning"></i> Climate Control Air Conditioning
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-shield-alt text-warning"></i> In-Room Biometric Digital Safe
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-concierge-bell text-warning"></i> 24/7 Dedicated Butler & Room Service
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-secondary">
                                <i class="fa fa-glass-cheers text-warning"></i> Curated Daily Minibar & Champagne
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sticky Booking Card -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-lg rounded-4 p-4 sticky-top" style="top: 100px; z-index: 100;">
                    <div class="d-flex justify-content-between align-items-baseline mb-3 pb-3 border-bottom">
                        <div>
                            <span class="fs-2 fw-bold text-dark">${{ number_format($getRoom->price, 0) }}</span>
                            <span class="text-muted">/ night</span>
                        </div>
                        <span class="badge bg-success-subtle text-success border px-2 py-1">
                            <i class="fa fa-check-circle me-1"></i> Best Rate Guaranteed
                        </span>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 px-3 small rounded-3 mb-3">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('hotel.rooms.booking', $getRoom->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Your Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Lord Alexander Wright" value="{{ Auth::check() ? Auth::user()->name : old('name') }}" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="name@domain.com" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="+1 (555) 000-0000" value="{{ old('phone_number', '+1 (555) 392-1002') }}" required>
                            </div>
                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Check-In Date</label>
                                <input type="date" id="checkInDate" name="check_in" class="form-control" value="{{ old('check_in', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}" required onchange="calculateLiveTotal()">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Check-Out Date</label>
                                <input type="date" id="checkOutDate" name="check_out" class="form-control" value="{{ old('check_out', date('Y-m-d', strtotime('+3 days'))) }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required onchange="calculateLiveTotal()">
                            </div>
                        </div>

                        <!-- Live Cost Estimation Box -->
                        <div class="bg-light p-3 rounded-3 mb-4 border">
                            <div class="d-flex justify-content-between small text-secondary mb-1">
                                <span>${{ number_format($getRoom->price, 0) }} x <span id="stayNights">3</span> Nights</span>
                                <span id="stayBasePrice">${{ number_format($getRoom->price * 3, 0) }}</span>
                            </div>
                            <div class="d-flex justify-content-between small text-secondary mb-2">
                                <span>Resort Fee & Taxes (Included)</span>
                                <span>$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between fw-bold text-dark pt-2 border-top">
                                <span>Estimated Total</span>
                                <span class="fs-5 text-warning-emphasis" id="stayTotalPrice">${{ number_format($getRoom->price * 3, 0) }}</span>
                            </div>
                        </div>

                        <button type="submit" class="sheki-btn-gold w-100 py-3 fs-6">
                            <i class="fa fa-lock me-2"></i> Reserve Suite & Proceed
                        </button>
                    </form>

                    <div class="text-center mt-3 small text-muted">
                        <i class="fa fa-shield-alt text-success me-1"></i> Instant Confirmation • Free Cancellation up to 48h prior
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Suites Section -->
@if($relatedRooms->isNotEmpty())
<section class="sheki-section bg-white border-top">
    <div class="container">
        <h3 class="sheki-section-title h2 mb-4">Other Suites at {{ $getRoom->hotel->name ?? 'Shekinah Hotels' }}</h3>
        <div class="row g-4">
            @foreach($relatedRooms as $rel)
                <div class="col-md-4">
                    <div class="sheki-card">
                        <div class="sheki-card-img-wrap" style="height: 200px;">
                            <img src="{{ asset('assets/images/' . $rel->image) }}" class="sheki-card-img" alt="{{ $rel->name }}" onerror="this.src='{{ asset('assets/images/room-2.jpg') }}'">
                        </div>
                        <div class="sheki-card-body">
                            <h4 class="sheki-card-title h5">
                                <a href="{{ route('hotel.rooms.details', $rel->id) }}">{{ $rel->name }}</a>
                            </h4>
                            <div class="sheki-card-footer">
                                <span class="sheki-price-tag h5 mb-0">${{ number_format($rel->price, 0) }} <small class="text-muted">/ night</small></span>
                                <a href="{{ route('hotel.rooms.details', $rel->id) }}" class="sheki-btn-outline-gold py-1 px-3" style="font-size: 0.8rem;">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script>
function calculateLiveTotal() {
    const checkIn = new Date(document.getElementById('checkInDate').value);
    const checkOut = new Date(document.getElementById('checkOutDate').value);
    const pricePerNight = {{ (float) $getRoom->price }};

    if (checkIn && checkOut && checkOut > checkIn) {
        const diffTime = Math.abs(checkOut - checkIn);
        const nights = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        const total = nights * pricePerNight;

        document.getElementById('stayNights').innerText = nights;
        document.getElementById('stayBasePrice').innerText = '$' + total.toLocaleString();
        document.getElementById('stayTotalPrice').innerText = '$' + total.toLocaleString();
    }
}
document.addEventListener('DOMContentLoaded', calculateLiveTotal);
</script>
@endpush