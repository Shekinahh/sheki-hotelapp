@extends('layouts.app')

@section('content')
<div class="sheki-auth-wrapper">
    <div class="sheki-auth-card">
        <div class="text-center mb-4">
            <i class="fa fa-crown text-warning fs-1 mb-2 d-block"></i>
            <h2 class="h3 fw-bold mb-1">Privilege Membership</h2>
            <p class="text-secondary small">Join Shekinah Hotels & Residences Member Club</p>
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label small fw-bold text-uppercase text-secondary">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fa fa-user text-muted"></i></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="e.g. Lord Alexander Wright">
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label small fw-bold text-uppercase text-secondary">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fa fa-envelope text-muted"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@domain.com">
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-bold text-uppercase text-secondary">Create Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fa fa-lock text-muted"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="At least 8 characters">
                </div>
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label small fw-bold text-uppercase text-secondary">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fa fa-lock text-muted"></i></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter password">
                </div>
            </div>

            <button type="submit" class="sheki-btn-gold w-100 py-3 fs-6 mb-3">
                <i class="fa fa-user-plus me-2"></i> Create Privilege Account
            </button>

            <div class="text-center pt-2 border-top small text-secondary">
                Already a member?
                <a href="{{ route('login') }}" class="text-warning fw-bold text-decoration-none ms-1">
                    Sign In
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
