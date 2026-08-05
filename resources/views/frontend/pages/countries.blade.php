@extends('frontend.layouts.master')

@section('title', 'Countries - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">
  {{-- <div class="breadcrumb"><a href="{{ route('frontend.home') }}">Home</a> / <span class="cur">Country</span></div> --}}

  <h1>Where do you want to <span style="color:var(--sky)">land</span>?</h1>
  <p>Every country has its own visa track, intake season, and cost of living. Explore the destination that fits your goal.</p>
</div>

<section class="sec tight">
  <div class="wrap">
    <!-- Filters removed since region data is not available in CMS -->
    
    <div class="countries-grid">
      @foreach($countries as $country)
      <a class="country-card" id="{{ Str::slug($country->name) }}" href="{{ route('frontend.apply') }}" data-region="all">
        <img src="{{ $country->image ? asset('uploads/countries/' . $country->image) : 'https://images.unsplash.com/photo-1517935706615-2717063c2225?w=500&auto=format&fit=crop' }}" alt="{{ $country->name }}">
        @if($country->approval_rate)
          <div class="cc-badge">{{ $country->approval_rate }} approval</div>
        @endif
        <div class="cc-corner tl"></div><div class="cc-corner br"></div>
        <div class="cc-info">
          <b>
            @if($country->flag_icon)
              @if(preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $country->flag_icon))
                <img src="{{ asset('uploads/countries/' . $country->flag_icon) }}" style="width: 18px; height: 18px; object-fit: cover; border-radius: 50%; vertical-align: middle; margin-right: 4px; border: 1px solid rgba(0,0,0,0.1);">
              @else
                {{ $country->flag_icon }}
              @endif
            @endif
            {{ $country->name }}
          </b>
          <span>{!! Str::limit(strip_tags($country->description), 50) !!}</span>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<section class="sec tight" style="padding-top:0;">
  <div class="wrap">
    <div class="stats-band">
      <div class="stat"><b>{{ $countries->count() }}</b><span>Countries covered</span></div>
      <div class="stat"><b>96%</b><span>Best approval rate (Canada)</span></div>
      <div class="stat"><b>6 wks</b><span>Fastest avg. processing</span></div>
      <div class="stat"><b>12k+</b><span>Files placed abroad</span></div>
    </div>
  </div>
</section>

<section class="cta-sec" style="padding-top:0;">
  <div class="cta-box">
    <div class="corner tl"></div><div class="corner tr"></div>
    <div class="corner bl"></div><div class="corner br"></div>
    <h2>Not sure which country fits you?</h2>
    <p>Take the free assessment — we'll shortlist 2–3 destinations based on your profile.</p>
    <a href="{{ route('frontend.apply') }}" class="btn-primary">Apply now
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>

@endsection
