<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title', 'Cholo Abroad — Study & Visa Consultants')</title>

<!-- Favicon -->
@if(setting() && setting()->favicon)
    <link rel="shortcut icon" href="{{ asset('uploads/' . setting()->favicon) }}">
@endif

<!-- DNS Prefetch for faster external resource resolution -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Preload critical assets -->
<link rel="preload" href="{{ asset('frontend/assets/css/style.css') }}?v={{ time() }}" as="style">
<link rel="preload" href="{{ asset('frontend/assets/js/main.js') }}" as="script">

<!-- Fonts (async/non-render-blocking) -->
<link rel="stylesheet" media="print" onload="this.media='all'; this.onload=null"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Hind+Siliguri:wght@500;600;700&display=swap">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Hind+Siliguri:wght@500;600;700&display=swap"></noscript>

<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}?v={{ time() }}">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('css')
<style>
    main {
        overflow-x: hidden;
        max-width: 100%;
    }
</style>
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div class="loader-content">
        @if(setting() && setting()->logo)
            <img src="{{ asset('uploads/' . setting()->logo) }}" alt="{{ setting()->site_name ?? 'Cholo Abroad' }}" class="loader-logo">
        @else
            <h2 style="color:var(--sky); font-weight:700; margin:0;">{{ setting()->site_name ?? 'Cholo Abroad' }}</h2>
        @endif
    </div>
</div>

<!-- Header (Nav) -->
@include('frontend.layouts.includes.header')

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
@include('frontend.layouts.includes.footer')

<!-- Extracted JS -->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
@stack('js')

</body>
</html>