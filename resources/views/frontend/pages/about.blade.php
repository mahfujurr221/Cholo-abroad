@extends('frontend.layouts.master')

@section('title', 'About Us - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">
  <div class="breadcrumb"><a href="{{ route('frontend.home') }}">Home</a> / <span class="cur">About</span></div>
  <div class="eyebrow-label">Who we are</div>
  <h1>We've filed the paperwork <span style="color:var(--sky)">so you don't have to</span></h1>
  <p>{{ $about->short_description ?? 'Cholo Abroad started with one frustration: visa consulting in Bangladesh was slow, opaque, and split across too many hands. We built the counsellor-owns-the-file model to fix that.' }}</p>
</div>

<section class="sec tight">
  <div class="wrap about-split">
    <div class="visual">
      <div class="corner tl" style="border-color:var(--sky);"></div>
      <div class="corner br" style="border-color:var(--gold);"></div>
      <div class="frame">
          <img src="{{ isset($about) && $about->image ? asset('uploads/' . $about->image) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=700&auto=format&fit=crop' }}" alt="Consulting team at work">
      </div>
    </div>
    <div>
      <div class="eyebrow-label">Our story</div>
      <h2>{{ $about->title ?? 'Founded by people who went through it themselves' }}</h2>
      
      @if(isset($about) && $about->description)
          {!! $about->description !!}
      @else
          <p>Cholo Abroad was founded in 2019 in Dhaka by a small team of former international students who each went through the visa process the hard way — rejected paperwork, missed intakes, and agents who disappeared after taking a fee.</p>
          <p>Today, that same team runs a counsellor-owns-the-file model: one person sees your case from the first call to the day you land, instead of passing you between departments. It's slower to scale, but it's why our approval rate holds above 90% across every destination we cover.</p>
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

<section class="sec tight">
  <div class="wrap">
    <div class="stats-band">
      <div class="stat"><b>2019</b><span>Founded in Dhaka</span></div>
      <div class="stat"><b>12k+</b><span>Applications filed</span></div>
      <div class="stat"><b>96%</b><span>Peak approval rate</span></div>
      <div class="stat"><b>18</b><span>Countries covered</span></div>
    </div>
  </div>
</section>

<!-- VALUES -->
<section class="sec">
  <div class="wrap">
    <div class="sec-head center">
      <div class="eyebrow-label">What we stand for</div>
      <h2>Three things we don't compromise on</h2>
    </div>
    <div class="value-grid">
      <div class="value-card">
        <div class="value-num">01</div>
        <h3>One counsellor, one file</h3>
        <p>Your case is never split across departments — the person who takes your first call is the one who sees you through to departure.</p>
      </div>
      <div class="value-card">
        <div class="value-num">02</div>
        <h3>Fixed fees, upfront</h3>
        <p>You see the full cost breakdown before signing anything — no surprise charges mid-process.</p>
      </div>
      <div class="value-card">
        <div class="value-num">03</div>
        <h3>Honest eligibility calls</h3>
        <p>If your profile is a weak fit for a country, we say so in the free assessment — not after you've paid.</p>
      </div>
    </div>
  </div>
</section>

@if(isset($faqs) && $faqs->count() > 0)
<!-- FAQS -->
<section class="sec tight">
  <div class="wrap">
    <div class="sec-head center">
      <div class="eyebrow-label">Common questions</div>
      <h2>Frequently Asked Questions</h2>
    </div>
    <div class="faq-list">
      @foreach($faqs as $faq)
      <div class="faq-item">
        <div class="faq-q">
          <h4>{{ $faq->question }}</h4>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <div class="faq-a">
          <p>{!! nl2br(e($faq->answer)) !!}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

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
