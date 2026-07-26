<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 - Server Error</title>
    <link rel="shortcut icon" href="{{ asset(setting()->favicon ?? 'frontend/assets/img/favicon.png') }}">
    
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { margin: 0; padding: 0; font-family: 'Inter', sans-serif; background: var(--bg); }
    </style>
</head>
<body>
    <main style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px;">
        <div style="text-align: center; max-width: 600px; padding: 60px 40px; background: #ffffff; border-radius: 24px; box-shadow: 0 30px 60px -30px rgba(10,42,94,0.15); border: 1px solid var(--line);">
            <h1 style="font-size: 120px; font-weight: 800; color: #dc2626; line-height: 1; margin-bottom: 20px; font-family: 'Poppins', sans-serif;">500</h1>
            <h3 style="font-size: 28px; font-weight: 700; color: var(--ink); margin-bottom: 16px; font-family: 'Poppins', sans-serif;">Internal Server Error.</h3>
            <p style="color: var(--muted); font-size: 16px; margin-bottom: 30px; line-height: 1.6;">
                Whoops, something went wrong on our servers. We're looking into it right now. Please try again later.
            </p>
            <div style="display: flex; justify-content: center;">
                <a href="{{ url('/') }}" class="apply-btn" style="text-decoration: none; display: inline-flex; justify-content: center; padding: 12px 32px; font-size: 16px; background: var(--navy); color: #fff; border-radius: 12px; font-weight: 600;">
                    Back to Homepage
                </a>
            </div>
        </div>
    </main>
</body>
</html>
