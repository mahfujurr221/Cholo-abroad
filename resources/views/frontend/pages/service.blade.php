@extends('frontend.layouts.master')

@section('title', 'Services - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">
  {{-- <div class="breadcrumb"><a href="{{ route('frontend.home') }}">Home</a> / <span class="cur">Service</span></div> --}}

  <h1>{!! setting()->services_title ?? 'Every step of the file, <span style="color:var(--sky)">handled</span>' !!}</h1>
  <p>{!! setting()->services_subtitle ?? 'Pick a single service or let one counsellor run the whole route — shortlisting to landing.' !!}</p>
</div>

<section class="sec tight">
  <div class="wrap">
    <div class="services-grid-3">
      @foreach($services as $service)
      <div class="service-card-light">
        <div class="service-icon">
            @if($service->icon)
                <i class="{{ $service->icon }}" style="font-size: 24px; color: var(--sky);"></i>
            @else
                <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            @endif
        </div>
        <h3>{{ $service->title }}</h3>
        <p>{{ $service->short_description }}</p>
        @if($service->description)
            <div class="incl" style="margin-top: 16px;">
                {!! $service->description !!}
            </div>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-sec">
  <div class="cta-box">
    <div class="corner tl"></div><div class="corner tr"></div>
    <div class="corner bl"></div><div class="corner br"></div>
    <h2>Ready to lock in your country?</h2>
    <p>Book a free 15-minute assessment — no obligation, just a clear next step.</p>
    <a href="{{ route('frontend.apply') }}" class="btn-primary">Apply now
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>

@endsection
