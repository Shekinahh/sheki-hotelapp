@extends('layouts.app')

@section('content')
<section class="py-5 bg-dark text-white text-center" style="background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.9)), url('{{ asset('assets/images/services-1.jpg') }}') center/cover;">
    <div class="container py-5">
        <span class="badge bg-warning text-dark fw-bold mb-2 text-uppercase">Bespoke Hospitality</span>
        <h1 class="display-4 fw-bold mb-3">Signature Services & Experiences</h1>
        <p class="text-secondary mx-auto fs-5" style="max-width: 650px;">
            Every facet of your stay is customized to your tastes, from private yacht charters to wellness retreats and culinary journeys.
        </p>
    </div>
</section>

<section class="sheki-section bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-utensils"></i></div>
                    <h3 class="h5 mb-2">Michelin Gastronomy</h3>
                    <p class="text-secondary small">Private in-suite chef dining, sommelier-curated wine cellar tastings, and bespoke farm-to-table menus.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-spa"></i></div>
                    <h3 class="h5 mb-2">Holistic Vitality Spa</h3>
                    <p class="text-secondary small">Deep tissue thermal therapies, volcanic stone massages, cedar sauna, and hydrotherapy pavilions.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-ship"></i></div>
                    <h3 class="h5 mb-2">Private Yacht & Jet Charters</h3>
                    <p class="text-secondary small">Exclusive ocean excursions, sunset champagne cruises, and seamless private helicopter or jet transfers.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-dumbbell"></i></div>
                    <h3 class="h5 mb-2">Personal Fitness & Wellness</h3>
                    <p class="text-secondary small">Technogym equipped studios, sunrise yoga on the beach, and certified personal trainers on demand.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-concierge-bell"></i></div>
                    <h3 class="h5 mb-2">24/7 VIP Concierge</h3>
                    <p class="text-secondary small">Priority access to cultural events, private shopping, and dedicated personal assistants for every request.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="sheki-feature-box">
                    <div class="sheki-feature-icon"><i class="fa fa-shield-alt"></i></div>
                    <h3 class="h5 mb-2">Discrete Executive Security</h3>
                    <p class="text-secondary small">Trained protective security details, biometric privacy controls, and secure private entrances.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
