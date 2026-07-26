<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - {{ setting()->site_name ?? 'Cholo Abroad' }}</title>
    <link rel="shortcut icon" href="{{ asset(setting()->favicon ? 'uploads/' . setting()->favicon : 'frontend/assets/img/favicon.png') }}">
    
    <!-- Load Only Necessary Fonts & Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { margin: 0; padding: 0; font-family: 'Inter', sans-serif; background: #ffffff; }
    </style>
</head>
<body>
    <main style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px;">
        <div class="form-shell" style="width: 100%; max-width: 500px; padding: 50px 40px; border-radius: 24px; box-shadow: 0 30px 60px -30px rgba(10,42,94,0.15); border: 1px solid var(--line);">
            <div style="text-align: center; margin-bottom: 30px;">
                <a href="/" style="display: inline-block; margin-bottom: 20px; text-decoration: none;">
                    @if(setting()->logo)
                        <img src="{{ asset('uploads/' . setting()->logo) }}" alt="Logo" style="height: 55px;">
                    @else
                        <h2 style="color: var(--navy); font-family: 'Poppins', sans-serif; font-weight: 800; margin: 0; font-size: 32px;">{{ setting()->site_name ?? 'Cholo Abroad' }}</h2>
                    @endif
                </a>
                <h3 style="color: var(--navy); font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 24px; margin: 0 0 8px 0;">Admin Login</h3>
                <p style="color: var(--muted); font-size: 14.5px; margin: 0;">Sign in to access your dashboard</p>
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
                        <input type="checkbox" name="remember" style="accent-color: var(--navy); width: 16px; height: 16px; cursor: pointer; margin: 0;">
                        Remember me
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: var(--sky); font-weight: 500; text-decoration: none;">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="apply-btn" style="width: 100%; justify-content: center; padding: 14px 20px; font-size: 16px; border-radius: 12px; border: none; cursor: pointer; background: var(--navy); color: #fff; font-weight: 600; font-family: 'Inter', sans-serif;">
                    Sign In
                </button>
            </form>
        </div>
    </main>
</body>
</html>
