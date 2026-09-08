@extends('layouts.app')

@section('content')
<div class="sheki-auth-wrapper">
    <div class="sheki-auth-card">
        <div class="text-center mb-4">
            <i class="fa fa-crown text-warning fs-1 mb-2 d-block"></i>
            <h2 class="h3 fw-bold mb-1">Welcome Back</h2>
            <p class="text-secondary small">Access your Shekinah Luxury Member Portal</p>
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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label small fw-bold text-uppercase text-secondary">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fa fa-envelope text-muted"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', 'guest@shekinah.com') }}" required autocomplete="email" autofocus placeholder="name@domain.com">
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <label for="password" class="form-label small fw-bold text-uppercase text-secondary">Password</label>
                    @if (Route::has('password.request'))
                        <a class="small text-warning text-decoration-none" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fa fa-lock text-muted"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="password123" required autocomplete="current-password" placeholder="••••••••">
                </div>
            </div>

            <div class="mb-4 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                <label class="form-check-label small text-secondary" for="remember">
                    Remember my credentials
                </label>
            </div>

            <button type="submit" class="sheki-btn-gold w-100 py-3 fs-6 mb-3">
                <i class="fa fa-sign-in-alt me-2"></i> Sign In to Account
            </button>

            <!-- Quick Demo Credentials Box -->
            <div class="p-3 bg-light rounded-3 text-center small border mb-3">
                <span class="text-muted d-block fw-bold mb-1">Pre-filled Demo Access:</span>
                <code class="text-dark">guest@shekinah.com</code> &bull; Pass: <code class="text-dark">password123</code>
            </div>

            @if (Route::has('register'))
                <div class="text-center pt-2 border-top small text-secondary">
                    Not a member yet?
                    <a href="{{ route('register') }}" class="text-warning fw-bold text-decoration-none ms-1">
                        Create Privilege Account
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
