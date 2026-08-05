@extends('frontend.layouts.master')

@section('title', 'About Us - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">
  {{-- <div class="breadcrumb"><a href="{{ route('frontend.home') }}">Home</a> / <span class="cur">About</span></div> --}}

  <h1>We've filed the paperwork <span style="color:var(--sky)">so you don't have to</span></h1>
  <p>{{ $about->mission ?? 'Cholo Abroad started with one frustration: visa consulting in Bangladesh was slow, opaque, and split across too many hands. We built the counsellor-owns-the-file model to fix that.' }}</p>
</div>

<section class="sec tight">
  <div class="wrap about-split">
    <div class="visual">
      <div class="corner tl" style="border-color:var(--sky);"></div>
      <div class="corner br" style="border-color:var(--gold);"></div>
      <div class="frame">
          <img src="{{ isset($about) && $about->image1 ? asset('uploads/' . $about->image1) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=700&auto=format&fit=crop' }}" alt="Consulting team at work">
      </div>
    </div>
    <div>

      <h2>{{ $about->title ?? 'Founded by people who went through it themselves' }}</h2>
      
      @if(isset($about) && $about->description)
          {!! $about->description !!}
      @else
          <p>Cholo Abroad was founded in 2019 in Dhaka by a small team of former international students who each went through the visa process the hard way — rejected paperwork, missed intakes, and agents who disappeared after taking a fee.</p>
          <p>Today, that same team runs a counsellor-owns-the-file model: one person sees your case from the first call to the day you land, instead of passing you between departments.</p>
      @endif

      <div class="hero-ctas" style="margin-top:28px; display:flex; gap:14px;">
        <a href="{{ route('frontend.apply') }}" class="btn-primary">Start free assessment
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('frontend.contact') }}" class="btn-ghost">Visit our office</a>
      </div>
    </div>
  </div>
</section>

{{-- Stats Band --}}
<section class="sec tight">
  <div class="wrap">
    <div class="stats-band">
      <div class="stat"><b>2019</b><span>Founded in Dhaka</span></div>
      <div class="stat"><b>12k+</b><span>Applications filed</span></div>
      <div class="stat"><b>96%</b><span>Peak approval rate</span></div>
      <div class="stat"><b>8</b><span>Countries covered</span></div>
    </div>
  </div>
</section>

{{-- Mission & Vision --}}
@if(isset($about) && ($about->mission || $about->vision))
<section class="sec tight">
  <div class="wrap">
    <div class="sec-head center">

      <h2>Mission & Vision</h2>
    </div>
    <div class="mission-vision-grid">
      @if($about->mission)
      <div style="background:#fff; border-radius:20px; padding:36px; border:1px solid var(--line); position:relative;">
        <div style="font-family:'Poppins',sans-serif; font-size:28px; font-weight:800; color:var(--gold); margin-bottom:14px;">01</div>
        <h3 style="font-size:20px; color:var(--navy); font-weight:700; margin-bottom:12px;">Our Mission</h3>
        <p style="color:var(--muted); line-height:1.7; font-size:15px;">{{ $about->mission }}</p>
      </div>
      @endif
      @if($about->vision)
      <div style="background:#fff; border-radius:20px; padding:36px; border:1px solid var(--line); position:relative;">
        <div style="font-family:'Poppins',sans-serif; font-size:28px; font-weight:800; color:var(--sky); margin-bottom:14px;">02</div>
        <h3 style="font-size:20px; color:var(--navy); font-weight:700; margin-bottom:12px;">Our Vision</h3>
        <p style="color:var(--muted); line-height:1.7; font-size:15px;">{{ $about->vision }}</p>
      </div>
      @endif
    </div>
  </div>
</section>
@endif

<!-- VALUES -->
<section class="sec">
  <div class="wrap">
    <div class="sec-head center">

      <h2>Three things we don't compromise on</h2>
    </div>
    <div class="value-grid">
      <div class="value-card">
        <div class="value-num">01</div>
        <h3>{{ $about->value_1_title ?? 'One counsellor, one file' }}</h3>
        <div>{!! $about->value_1_desc ?? '<p>Your case is never split across departments — the person who takes your first call is the one who sees you through to departure.</p>' !!}</div>
      </div>
      <div class="value-card">
        <div class="value-num">02</div>
        <h3>{{ $about->value_2_title ?? 'Fixed fees, upfront' }}</h3>
        <div>{!! $about->value_2_desc ?? '<p>You see the full cost breakdown before signing anything — no surprise charges mid-process.</p>' !!}</div>
      </div>
      <div class="value-card">
        <div class="value-num">03</div>
        <h3>{{ $about->value_3_title ?? 'Honest eligibility calls' }}</h3>
        <div>{!! $about->value_3_desc ?? '<p>If your profile is a weak fit for a country, we say so in the free assessment — not after you\'ve paid.</p>' !!}</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-sec">
  <div class="cta-box">
    <div class="corner tl"></div><div class="corner tr"></div>
    <div class="corner bl"></div><div class="corner br"></div>
    <h2>Want to talk to a counsellor first?</h2>
    <p>15 minutes, no obligation — we'll tell you honestly if you're a good fit.</p>
    <a href="{{ route('frontend.contact') }}" class="btn-primary">Contact us
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>

@endsection
