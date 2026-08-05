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
@else
    <link rel="shortcut icon" href="{{ asset('backend/images/default_favicon.png') }}">
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

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}?v={{ time() }}">
@stack('css')

</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div class="loader-content">
        <img src="{{ asset(setting()->logo ? 'uploads/' . setting()->logo : 'backend/images/bdclean_logo_animated.gif') }}" alt="{{ setting()->site_name ?? 'Cholo Abroad' }}" class="loader-logo">
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