@extends('layouts.app')

@section('content')
<section class="py-5 bg-dark text-white text-center">
    <div class="container py-4">
        <span class="badge bg-warning text-dark fw-bold mb-2 text-uppercase">Direct Communication</span>
        <h1 class="display-4 fw-bold mb-2">Connect With Our Concierge</h1>
        <p class="text-secondary mx-auto fs-5" style="max-width: 600px;">
            Whether planning an intimate getaway or a grand private event, our concierge team is at your service.
        </p>
    </div>
</section>

<section class="sheki-section bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white h-100">
                    <h3 class="h4 mb-4">Concierge Desk</h3>

                    <div class="d-flex gap-3 mb-4">
                        <div class="rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                            <i class="fa fa-phone-alt fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">VIP Reservation Line</h6>
                            <p class="text-secondary mb-0">+1 (800) 743-5462</p>
                            <small class="text-muted">Available 24 hours daily</small>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4">
                        <div class="rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                            <i class="fa fa-envelope fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Electronic Dispatch</h6>
                            <p class="text-secondary mb-0">concierge@shekinahhotel.com</p>
                            <small class="text-muted">Prompt reply within 30 minutes</small>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                            <i class="fa fa-map-marked-alt fs-5"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Executive Headquarters</h6>
                            <p class="text-secondary mb-0">740 Ocean View Avenue, Malibu, CA 90265</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <h3 class="h4 mb-4">Inquiry & Special Requests</h3>
                    <form action="#" onsubmit="event.preventDefault(); alert('Your message has been sent to our VIP Concierge team. We will respond shortly.');">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Full Name</label>
                                <input type="text" class="form-control" placeholder="Lady or Sir Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Email Address</label>
                                <input type="email" class="form-control" placeholder="guest@domain.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Subject / Interest</label>
                                <select class="form-select">
                                    <option>Bespoke Suite Reservation</option>
                                    <option>Private Island Event or Wedding</option>
                                    <option>Yacht / Helicopter Charter</option>
                                    <option>Corporate Executive Retreat</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase text-secondary">Your Message</label>
                                <textarea class="form-control" rows="5" placeholder="Detail any preferences or dates..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="sheki-btn-gold py-3 px-4">
                                    <i class="fa fa-paper-plane me-2"></i> Submit Inquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
