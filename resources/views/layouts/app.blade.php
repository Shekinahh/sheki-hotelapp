<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', "Shekinah's Hotel App") }} - Luxury Hotels & Suites</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Shekinah Modern Luxury Design System -->
    <link rel="stylesheet" href="{{ asset('assets/css/shekinah-modern.css') }}">

    @stack('styles')
</head>
<body>
    <div id="app">
        <!-- Top Info Bar -->
        <div class="sheki-topbar d-none d-md-block">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="me-3"><i class="fa fa-phone-alt text-warning me-1"></i> VIP Concierge: +1 (800) 743-5462</span>
                        <span><i class="fa fa-envelope text-warning me-1"></i> reservations@shekinahhotel.com</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span><i class="fa fa-map-marker-alt text-warning me-1"></i> Malibu • Manhattan • Bora Bora • Swiss Alps</span>
                        @guest
                            <a href="{{ route('login') }}" class="badge bg-dark border border-secondary text-decoration-none py-1 px-2">
                                <i class="fa fa-user me-1 text-warning"></i> Member Access
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Modern Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark sheki-navbar">
            <div class="container">
                <a class="sheki-brand" href="{{ route('home') }}">
                    <i class="fa fa-crown text-warning"></i>
                    <span>SHEKINAH</span> HOTELS
                    <span class="sheki-brand-badge d-none d-sm-inline">LUXURY</span>
                </a>

                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#shekiNav" aria-controls="shekiNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="shekiNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link sheki-nav-link {{ request()->routeIs('home') || request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sheki-nav-link {{ request()->routeIs('rooms.all') || request()->routeIs('hotel.rooms*') ? 'active' : '' }}" href="{{ route('rooms.all') }}">
                                Suites & Rooms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sheki-nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">
                                Experiences
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sheki-nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sheki-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0 flex-wrap flex-sm-nowrap">
                        @guest
                            <a href="{{ route('login') }}" class="sheki-btn-outline-gold">
                                <i class="fa fa-sign-in-alt me-1"></i> Sign In
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="sheki-btn-gold">
                                    <i class="fa fa-user-plus me-1"></i> Join Club
                                </a>
                            @endif
                        @else
                            <a href="{{ route('user.bookings') }}" class="sheki-btn-outline-gold">
                                <i class="fa fa-calendar-check me-1"></i> My Bookings
                            </a>

                            <div class="dropdown ms-1">
                                <button class="btn btn-outline-light dropdown-toggle rounded-pill px-3 py-2 d-inline-flex align-items-center" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user-circle text-warning me-2"></i> {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2" aria-labelledby="userMenu">
                                    <li><h6 class="dropdown-header text-uppercase fw-bold" style="font-size: 0.75rem;">Account</h6></li>
                                    <li><a class="dropdown-item" href="{{ route('user.bookings') }}"><i class="fa fa-bookmark text-muted me-2"></i> Reservations</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out-alt me-2"></i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Flash Messages & Alerts -->
        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-flex align-items-center" role="alert">
                    <i class="fa fa-check-circle me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 d-flex align-items-center" role="alert">
                    <i class="fa fa-exclamation-circle me-2 fs-5"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if(session('info'))
            <div class="container mt-3">
                <div class="alert alert-info alert-dismissible fade show shadow-sm border-0 d-flex align-items-center" role="alert">
                    <i class="fa fa-info-circle me-2 fs-5"></i>
                    <div>{{ session('info') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <!-- Main Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Luxury Footer -->
        <footer class="sheki-footer">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <a class="sheki-brand mb-3 d-inline-block" href="{{ route('home') }}">
                            <i class="fa fa-crown text-warning"></i>
                            SHEKINAH <span>HOTELS</span>
                        </a>
                        <p class="text-secondary small pe-lg-4">
                            Embrace timeless grandeur, bespoke elegance, and bespoke sanctuary living. Shekinah Hotels & Residences offers world-renowned hospitality across the globe's most breathtaking destinations.
                        </p>
                        <div class="d-flex gap-2 mt-3">
                            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 36px; height: 36px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 36px; height: 36px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 36px; height: 36px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 36px; height: 36px; display:flex; align-items:center; justify-content:center;"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <h4>Explore</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('home') }}">Home Sanctuary</a></li>
                            <li class="mb-2"><a href="{{ route('rooms.all') }}">Suites & Penthouses</a></li>
                            <li class="mb-2"><a href="{{ route('services') }}">Bespoke Experiences</a></li>
                            <li class="mb-2"><a href="{{ route('about') }}">About Shekinah</a></li>
                            <li class="mb-2"><a href="{{ route('contact') }}">Private Concierge</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h4>Global Retreats</h4>
                        <ul class="list-unstyled small text-secondary">
                            <li class="mb-2"><i class="fa fa-map-pin text-warning me-2"></i> Malibu Oceanfront Palace, CA</li>
                            <li class="mb-2"><i class="fa fa-map-pin text-warning me-2"></i> Royal Heights Suites, Manhattan</li>
                            <li class="mb-2"><i class="fa fa-map-pin text-warning me-2"></i> Sanctuary Island Resort, Bora Bora</li>
                            <li class="mb-2"><i class="fa fa-map-pin text-warning me-2"></i> Alpine Chalet & Wellness, Zermatt</li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h4>Privilege Newsletter</h4>
                        <p class="small text-secondary">Subscribe to receive exclusive invitation-only rates and seasonal retreat announcements.</p>
                        <form action="#" onsubmit="event.preventDefault(); alert('Thank you for subscribing to Shekinah Privilege.');">
                            <div class="input-group mb-2">
                                <input type="email" class="form-control form-control-sm bg-dark text-white border-secondary" placeholder="Your email address" required>
                                <button class="btn btn-warning btn-sm fw-bold px-3" type="submit">Join</button>
                            </div>
                        </form>
                        <small class="text-muted"><i class="fa fa-shield-alt text-success me-1"></i> 100% Privacy Protected</small>
                    </div>
                </div>

                <div class="sheki-footer-bottom d-flex flex-wrap justify-content-between align-items-center">
                    <p class="mb-0 text-secondary">&copy; {{ date('Y') }} Shekinah's Hotel App. All rights reserved. Mastercrafted for ultimate luxury hospitality.</p>
                    <div class="d-flex gap-3 small">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Security & Compliance</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
