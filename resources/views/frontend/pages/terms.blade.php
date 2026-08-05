@extends('frontend.layouts.master')

@section('title', 'Terms of Service - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')
<div class="page-hero">
    <h1>Terms of Service</h1>
    <p>Please read these terms carefully before using our services.</p>
</div>

<section class="sec" style="padding-top: 20px;">
    <div class="wrap" style="max-width: 800px; margin: 0 auto; line-height: 1.8; color: var(--muted);">
        @if(setting() && setting()->terms_and_conditions)
            {!! setting()->terms_and_conditions !!}
        @else
            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">1. Acceptance of Terms</h3>
            <p>By accessing or using the services provided by {{ setting()->site_name ?? 'Cholo Abroad' }}, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, you may not access our services.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">2. Services Provided</h3>
            <p>We provide consultancy, guidance, and assistance with university admissions and visa applications for studying and working abroad. The final decision on university admissions and visa approvals rests solely with the respective institutions and government authorities.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">3. User Responsibilities</h3>
            <p>You agree to provide accurate, complete, and updated information for your applications. You are responsible for ensuring that all documents submitted are genuine and valid.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">4. Limitation of Liability</h3>
            <p>{{ setting()->site_name ?? 'Cholo Abroad' }} shall not be held liable for any rejection of university applications or visa denials, as these decisions are entirely beyond our control.</p>

            <h3 style="color: var(--navy); margin-bottom: 12px; margin-top: 32px;">5. Changes to Terms</h3>
            <p>We reserve the right to modify or replace these Terms of Service at any time. We will try to provide at least 30 days' notice prior to any new terms taking effect.</p>
        @endif
    </div>
</section>
@endsection
