@extends('layouts.app')

@section('content')
<!-- Header Banner -->
<section class="py-5" style="background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.9)), url('{{ asset('assets/images/image_3.jpg') }}') center/cover; color: #fff;">
    <div class="container py-4 text-center">
        <span class="sheki-section-tag text-warning">
            {{ $hotel ? $hotel->location : 'Global Luxury Collection' }}
        </span>
        <h1 class="text-white display-5 fw-bold mb-3">
            {{ $hotel ? $hotel->name : 'Suites & Residences' }}
        </h1>
        <p class="text-secondary mx-auto" style="max-width: 650px;">
            {{ $hotel ? $hotel->description : 'Explore our collection of world-class suites, each architecturally designed with premium furnishings, lavish marble bathrooms, and breathtaking panoramic views.' }}
        </p>
    </div>
</section>

<!-- Filter & Rooms Grid -->
<section class="sheki-section bg-light">
    <div class="container">
        <!-- Filter Bar -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-5">
            <form action="{{ route('rooms.all') }}" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label small fw-bold text-uppercase text-secondary">Resort Location</label>
                        <select name="hotel_id" class="form-select">
                            <option value="">All Shekinah Retreats</option>
                            @foreach($hotels as $h)
                                <option value="{{ $h->id }}" {{ request('hotel_id') == $h->id || (isset($hotel) && $hotel->id == $h->id) ? 'selected' : '' }}>
                                    {{ $h->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-label small fw-bold text-uppercase text-secondary">Guests Required</label>
                        <select name="guests" class="form-select">
                            <option value="">Any Capacity</option>
                            <option value="1" {{ request('guests') == '1' ? 'selected' : '' }}>1+ Guest</option>
                            <option value="2" {{ request('guests') == '2' ? 'selected' : '' }}>2+ Guests</option>
                            <option value="4" {{ request('guests') == '4' ? 'selected' : '' }}>4+ Guests</option>
                            <option value="6" {{ request('guests') == '6' ? 'selected' : '' }}>6+ Guests</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label class="form-label small fw-bold text-uppercase text-secondary">Max Nightly Price</label>
                        <select name="max_price" class="form-select">
                            <option value="">Any Budget</option>
                            <option value="350" {{ request('max_price') == '350' ? 'selected' : '' }}>Up to $350 / night</option>
                            <option value="500" {{ request('max_price') == '500' ? 'selected' : '' }}>Up to $500 / night</option>
                            <option value="750" {{ request('max_price') == '750' ? 'selected' : '' }}>Up to $750 / night</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <button type="submit" class="sheki-btn-gold w-100 py-2">
                            <i class="fa fa-filter"></i> Apply Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Rooms List -->
        @if($getRooms->isEmpty())
            <div class="text-center py-5 bg-white rounded-4 shadow-sm p-5">
                <i class="fa fa-bed fa-3x text-muted mb-3"></i>
                <h3>No Suites Found</h3>
                <p class="text-secondary">Try adjusting your filters or browsing all Shekinah destinations.</p>
                <a href="{{ route('rooms.all') }}" class="sheki-btn-gold mt-2">View All Suites</a>
            </div>
        @else
            <div class="row g-4">
                @foreach($getRooms as $room)
                    <div class="col-lg-4 col-md-6">
                        <div class="sheki-card">
                            <div class="sheki-card-img-wrap" style="height: 260px;">
                                <img src="{{ asset('assets/images/' . $room->image) }}" class="sheki-card-img" alt="{{ $room->name }}" onerror="this.src='{{ asset('assets/images/room-1.jpg') }}'">
                                <div class="sheki-badge-rating">
                                    <i class="fa fa-star"></i> 5.0
                                </div>
                                <div class="sheki-badge-location">
                                    <i class="fa fa-map-marker-alt text-danger"></i> {{ $room->hotel->location ?? 'Shekinah Resort' }}
                                </div>
                            </div>

                            <div class="sheki-card-body">
                                <span class="badge bg-warning-subtle text-warning-emphasis mb-2 align-self-start py-1 px-2 border">
                                    {{ $room->hotel->name ?? 'Luxury Suite' }}
                                </span>
                                <h3 class="sheki-card-title">
                                    <a href="{{ route('hotel.rooms.details', $room->id) }}">{{ $room->name }}</a>
                                </h3>
                                <p class="sheki-card-text">
                                    {{ Str::limit($room->description ?? 'Featuring bespoke decor, high thread count linens, rainfall shower, and panoramic balcony.', 95) }}
                                </p>

                                <div class="sheki-amenities-pills">
                                    <span class="sheki-amenity-pill"><i class="fa fa-user-friends text-warning"></i> {{ $room->max_persons }} Guests</span>
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
                                        View & Book <i class="fa fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $getRooms->links() }}
            </div>
        @endif
    </div>
</section>
@endsection