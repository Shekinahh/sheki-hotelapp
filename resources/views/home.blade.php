@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="sheki-hero" style="background-image: url('{{ asset('assets/images/image_2.jpg') }}');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 sheki-hero-content">
                <span class="sheki-hero-tag">
                    <i class="fa fa-star text-warning"></i> Awarded World's Best Luxury Retreat 2026
                </span>
                <h1 class="sheki-hero-title">
                    Timeless Luxury.<br>
                    Unmatched <span style="color: var(--sheki-gold);">Elegance.</span>
                </h1>
                <p class="sheki-hero-desc">
                    Discover handpicked palatial suites, oceanfront villas, and mountain chalets across the world’s most coveted destinations with Shekinah Hotels & Residences.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('rooms.all') }}" class="sheki-btn-gold">
                        <i class="fa fa-compass"></i> Explore Luxury Suites
                    </a>
                    <a href="{{ route('services') }}" class="sheki-btn-outline-gold">
                        <i class="fa fa-play-circle"></i> Discover Experiences
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Search & Filter Bar -->
<div class="container">
    <div class="sheki-search-card">
        <form action="{{ route('rooms.all') }}" method="GET">
            <div class="row g-3 align-items-end">
                <div class="col-lg-4 col-md-6">
                    <label><i class="fa fa-hotel text-warning"></i> Destination / Resort</label>
                    <select name="hotel_id" class="form-select">
                        <option value="">All Shekinah Retreats</option>
                        @foreach($hotels as $h)
                            <option value="{{ $h->id }}" {{ request('hotel_id') == $h->id ? 'selected' : '' }}>
                                {{ $h->name }} ({{ $h->location }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <label><i class="fa fa-calendar-alt text-warning"></i> Check In</label>
                    <input type="date" name="check_in" class="form-control" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <label><i class="fa fa-calendar-check text-warning"></i> Check Out</label>
                    <input type="date" name="check_out" class="form-control" value="{{ date('Y-m-d', strtotime('+3 days')) }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                </div>

                <div class="col-lg-2 col-md-12">
                    <button type="submit" class="sheki-btn-gold w-100 py-2">
                        <i class="fa fa-search"></i> Find Suites
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Featured Luxury Hotels & Resorts -->
<section class="sheki-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sheki-section-tag">Global Sanctuary Locations</span>
            <h2 class="sheki-section-title">World-Class Destinations</h2>
            <p class="sheki-section-desc">
                From sun-drenched private shores to vibrant city skylines and pristine mountain peaks, each Shekinah resort offers an extraordinary haven of bespoke hospitality.
            </p>
        </div>

        <div class="row g-4">
            @foreach($hotels as $hotel)
                <div class="col-lg-3 col-md-6">
                    <div class="sheki-card">
                        <div class="sheki-card-img-wrap">
                            <img src="{{ asset('assets/images/' . $hotel->image) }}" class="sheki-card-img" alt="{{ $hotel->name }}" onerror="this.src='{{ asset('assets/images/image_2.jpg') }}'">
                            <div class="sheki-badge-rating">
                                <i class="fa fa-star"></i> {{ number_format($hotel->rating, 1) }}
                            </div>
                            <div class="sheki-badge-location">
                                <i class="fa fa-map-marker-alt text-danger"></i> {{ $hotel->location }}
                            </div>
                        </div>
                        <div class="sheki-card-body">
                            <h3 class="sheki-card-title">
                                <a href="{{ route('hotel.rooms', $hotel->id) }}">{{ $hotel->name }}</a>
                            </h3>
                            <p class="sheki-card-text">
                                {{ Str::limit($hotel->description, 95) }}
                            </p>
                            <div class="sheki-card-footer pt-3 border-top">
                                <span class="badge bg-light text-dark border">
                                    <i class="fa fa-door-open text-warning me-1"></i> {{ $hotel->apartments_count ?? 2 }} Exclusive Suites
                                </span>
                                <a href="{{ route('hotel.rooms', $hotel->id) }}" class="sheki-btn-outline-gold py-1 px-3" style="font-size: 0.82rem;">
                                    View Resort <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Handcrafted Suites & Residences -->
<section class="sheki-section bg-light">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-5">
            <div>
                <span class="sheki-section-tag">Curated Accommodations</span>
                <h2 class="sheki-section-title mb-0">Signature Suites & Residences</h2>
            </div>
            <a href="{{ route('rooms.all') }}" class="sheki-btn-outline-gold mt-3 mt-md-0">
                View All Suites <i class="fa fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach($rooms as $room)
                <div class="col-lg-4 col-md-6">
                    <div class="sheki-card">
                        <div class="sheki-card-img-wrap" style="height: 260px;">
                            <img src="{{ asset('assets/images/' . $room->image) }}" class="sheki-card-img" alt="{{ $room->name }}" onerror="this.src='{{ asset('assets/images/room-1.jpg') }}'">
                            <div class="sheki-badge-rating">
                                <i class="fa fa-star"></i> 5.0
                            </div>
                            <div class="sheki-badge-location">
                                <i class="fa fa-building text-warning"></i> {{ $room->hotel->name ?? 'Shekinah Resort' }}
                            </div>
                        </div>
                        <div class="sheki-card-body">
                            <h3 class="sheki-card-title">
                                <a href="{{ route('hotel.rooms.details', $room->id) }}">{{ $room->name }}</a>
                            </h3>
                            <p class="sheki-card-text">
                                {{ Str::limit($room->description ?? 'Bespoke luxury suite offering panoramic views, master ensuite bathroom, and curated interior decor.', 90) }}
                            </p>

                            <div class="sheki-amenities-pills">
                                <span class="sheki-amenity-pill"><i class="fa fa-user-friends text-warning"></i> Up to {{ $room->max_persons }} Guests</span>
                                <span class="sheki-amenity-pill"><i class="fa fa-vector-square text-warning"></i> {{ $room->size }} m²</span>
                                <span class="sheki-amenity-pill"><i class="fa fa-eye text-warning"></i> {{ $room->view }}</span>
                                <span class="sheki-amenity-pill"><i class="fa fa-bed text-warning"></i> {{ $room->num_beds }} Bed(s)</span>
                            </div>

                            <div class="sheki-card-footer">
                                <div>
                                    <span class="sheki-price-tag">${{ number_format($room->price, 0) }}</span>
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">/ night + taxes</small>
                                </div>
                                <a href="{{ route('hotel.rooms.details', $room->id) }}" class="sheki-btn-gold py-2 px-3">
                                    Book Suite <i class="fa fa-chevron-right ms-1" style="font-size: 0.75rem;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- The Shekinah Experience -->
<section class="sheki-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sheki-section-tag">Unrivaled Hospitality</span>
            <h2 class="sheki-section-title">The Shekinah Signature Experience</h2>
            <p class="sheki-section-desc">
                Every stay is meticulously orchestrated with uncompromising standards of comfort, privacy, and refinement.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-utensils"></i></div>
                    <h4 class="h5 mb-2">Michelin Dining</h4>
                    <p class="text-secondary small mb-0">Epicurean masterpieces crafted by celebrated executive chefs using fresh artisanal ingredients.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-spa"></i></div>
                    <h4 class="h5 mb-2">Holistic Spa & Wellness</h4>
                    <p class="text-secondary small mb-0">Therapeutic mineral pools, sauna sanctuaries, and customized rejuvenating treatments.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-user-shield"></i></div>
                    <h4 class="h5 mb-2">24/7 Private Butler</h4>
                    <p class="text-secondary small mb-0">Discrete, attentive personalized concierge to fulfill your every request around the clock.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-car-side"></i></div>
                    <h4 class="h5 mb-2">Chauffeur Transfer</h4>
                    <p class="text-secondary small mb-0">Complimentary private luxury airport limousine service for seamless arrivals and departures.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Guest Testimonials -->
<section class="sheki-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sheki-section-tag">Testimonials</span>
            <h2 class="sheki-section-title">Celebrated by Discerning Guests</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border border-1">
                    <div class="text-warning mb-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <p class="text-secondary fst-italic">
                        "Shekinah Malibu was the single most transcendent vacation experience of our lives. The Presidential Oceanfront Suite views are utterly breathtaking."
                    </p>
                    <div class="d-flex align-items-center gap-3 mt-4 pt-3 border-top">
                        <div class="rounded-circle bg-warning text-dark fw-bold d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            SC
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Sophia Chen</h6>
                            <small class="text-muted">Verified Guest • London, UK</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border border-1">
                    <div class="text-warning mb-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <p class="text-secondary fst-italic">
                        "From the private airport transfer to the personalized champagne service, the attention to detail is beyond anything I have experienced in 5-star hospitality."
                    </p>
                    <div class="d-flex align-items-center gap-3 mt-4 pt-3 border-top">
                        <div class="rounded-circle bg-warning text-dark fw-bold d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            AR
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Alexander Ross</h6>
                            <small class="text-muted">Verified Guest • Zurich, Switzerland</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border border-1">
                    <div class="text-warning mb-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                    <p class="text-secondary fst-italic">
                        "An oasis of peace and luxury in Manhattan. The penthouse suite is a masterpiece of architectural sophistication."
                    </p>
                    <div class="d-flex align-items-center gap-3 mt-4 pt-3 border-top">
                        <div class="rounded-circle bg-warning text-dark fw-bold d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            EM
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Elena Moretti</h6>
                            <small class="text-muted">Verified Guest • Milan, Italy</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-5" style="background: linear-gradient(135deg, #0b1120 0%, #1e293b 100%); color: #fff;">
    <div class="container py-4 text-center">
        <h2 class="text-white mb-3" style="font-size: 2.4rem;">Ready for an Unforgettable Stay?</h2>
        <p class="text-secondary mb-4 mx-auto" style="max-width: 600px;">
            Book direct for the guaranteed best rates, complimentary room upgrade when available, and bespoke VIP amenities.
        </p>
        <a href="{{ route('rooms.all') }}" class="sheki-btn-gold py-3 px-5 fs-6">
            <i class="fa fa-calendar-check me-2"></i> Reserve Your Stay Today
        </a>
    </div>
</section>
@endsection
