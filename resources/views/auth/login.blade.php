@extends('frontend.layouts.auth')

@section('title', 'Admin Login - Cholo Abroad')

@section('content')
<main style="background: #ffffff; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px;">
    
    <div class="form-shell" style="width: 100%; max-width: 500px; padding: 50px 40px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <a href="/">
                <img src="{{ asset(setting()->logo ? 'uploads/' . setting()->logo : 'frontend/assets/img/logo/logo.png') }}" alt="Logo" style="height: 55px; margin: 0 auto 20px;">
            </a>
            <h3 style="color: var(--navy); font-weight: 700; font-size: 24px;">Admin Login</h3>
            <p style="color: var(--muted); font-size: 14.5px;">Sign in to access your dashboard</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-field full" style="margin-bottom: 20px;">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                @error('email')
                    <span style="color: #dc2626; font-size: 13px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field full" style="margin-bottom: 20px;">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                @error('password')
                    <span style="color: #dc2626; font-size: 13px; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; font-size: 14px; color: var(--muted);">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                    <input type="checkbox" name="remember" style="accent-color: var(--navy); width: 16px; height: 16px; cursor: pointer;">
                    Remember me
                </label>
                
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--sky); font-weight: 500;">Forgot Password?</a>
                @endif
            </div>

            <button type="submit" class="apply-btn" style="width: 100%; justify-content: center; padding: 14px 20px; font-size: 16px; border-radius: 12px;">
                Sign In
            </button>
        </form>
    </div>
</main>
@endsection
