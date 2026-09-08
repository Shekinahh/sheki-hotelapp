@extends('layouts.app')

@section('content')
<section class="py-5 bg-dark text-white text-center" style="background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.9)), url('{{ asset('assets/images/image_4.jpg') }}') center/cover;">
    <div class="container py-5">
        <span class="badge bg-warning text-dark fw-bold mb-2 text-uppercase">The Shekinah Heritage</span>
        <h1 class="display-4 fw-bold mb-3">Redefining Hospitality Since 2012</h1>
        <p class="text-secondary mx-auto fs-5" style="max-width: 650px;">
            A sanctuary where bespoke luxury meets architectural distinction and authentic world-class service.
        </p>
    </div>
</section>

<section class="sheki-section bg-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <span class="sheki-section-tag">Our Vision</span>
                <h2 class="sheki-section-title">A Living Legacy of Refined Comfort</h2>
                <p class="text-secondary leading-relaxed mb-4">
                    Founded with a passion for excellence, Shekinah Hotels & Residences has curated an extraordinary portfolio of luxury retreats across the world’s most mesmerizing coastlines, iconic skylines, and tranquil mountain valleys.
                </p>
                <p class="text-secondary leading-relaxed mb-4">
                    Every suite is crafted with attention to organic materials, acoustics, ambient lighting, and bespoke art pieces to immerse every guest in an unparalleled atmosphere of rejuvenation and indulgence.
                </p>
                <div class="row g-3 pt-2">
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 text-center border">
                            <h3 class="h2 text-warning mb-0 fw-bold">4</h3>
                            <small class="text-muted text-uppercase fw-bold">Global Retreats</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-3 text-center border">
                            <h3 class="h2 text-warning mb-0 fw-bold">99.4%</h3>
                            <small class="text-muted text-uppercase fw-bold">Guest Satisfaction</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 overflow-hidden shadow-lg" style="height: 440px;">
                    <img src="{{ asset('assets/images/image_5.jpg') }}" class="w-100 h-100" style="object-fit: cover;" alt="About Shekinah">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
