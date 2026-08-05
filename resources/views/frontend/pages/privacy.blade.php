@extends('frontend.layouts.master')

@section('title', 'Privacy Policy - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')
<div class="page-hero">
    <h1>Privacy Policy</h1>
    <p>How we handle and protect your personal information.</p>
</div>

<section class="sec" style="padding-top: 20px;">
    <div class="wrap" style="max-width: 800px; margin: 0 auto; line-height: 1.8; color: var(--muted);">
        @if(setting() && setting()->privacy_policy)
            {!! setting()->privacy_policy !!}
        @else
            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">1. Introduction</h3>
            <p>At {{ setting()->site_name ?? 'Cholo Abroad' }}, we are committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and safeguard your personal information when you use our services.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">2. Information We Collect</h3>
            <p>We collect information that you voluntarily provide when applying for visas, requesting consultancy services, or contacting us. This may include your name, contact details, educational background, and passport information.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">3. How We Use Your Information</h3>
            <p>Your information is used strictly to provide you with visa and study abroad consultancy services. We may also use it to communicate with you about your application status and updates regarding our services.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">4. Data Security</h3>
            <p>We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">5. Contact Us</h3>
            <p>If you have any questions or concerns about this Privacy Policy, please contact us at <a href="mailto:{{ setting()->email ?? 'hello@choloabroad.com' }}" style="color: var(--sky); font-weight: 600;">{{ setting()->email ?? 'hello@choloabroad.com' }}</a>.</p>
        @endif
    </div>
</section>
@endsection
