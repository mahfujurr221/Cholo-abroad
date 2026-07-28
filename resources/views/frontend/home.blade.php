@extends('frontend.layouts.master')

@section('title', 'Home - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<style>
  .hero-swiper { width: 100%; overflow: hidden; position: relative; }
  .testi-swiper { width: 100%; overflow: hidden; padding-bottom: 40px; position: relative; }
  .swiper-pagination-bullet-active { background: var(--sky); }
  .hero-swiper .swiper-pagination { bottom: 10px; }
</style>
@endpush

@if($heroes->count() > 0)
<!-- HERO -->
<div class="swiper hero-swiper">
  <div class="swiper-wrapper">
    @foreach($heroes as $hero)
    <div class="swiper-slide">
      <section class="hero">
        <div>
          <div class="hero-eyebrow"><span class="dot"></span> {{ $hero->subtitle }}</div>
          <h1>{!! nl2br(e($hero->title)) !!}</h1>
          <p class="sub">{{ $hero->description }}</p>
          <div class="hero-ctas">
            <a href="{{ $hero->button_link ?? route('frontend.apply') }}" class="btn-primary">{{ $hero->button_text ?? 'Start free assessment' }}
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('frontend.about') }}" class="btn-ghost">See success stories</a>
          </div>
          <div class="hero-stats">
            <div class="stat"><b>96%</b><span>Visa approval rate</span></div>
            <div class="stat"><b>18</b><span>Destination countries</span></div>
            <div class="stat"><b>12k+</b><span>Applications filed</span></div>
          </div>
        </div>

        <div class="hero-visual">
          <svg class="flight-path" viewBox="0 0 130 70" fill="none">
            <path d="M2 68 L120 5" stroke="#F2A81D" stroke-width="2" stroke-dasharray="1 8" stroke-linecap="round"/>
            <path d="M110 2 L124 5 L118 16 Z" fill="#1E88E5"/>
          </svg>
          <div class="lock-frame">
            <div class="corner tl"></div><div class="corner tr"></div>
            <div class="corner bl"></div><div class="corner br"></div>
          </div>
          <div class="hero-card">
            <img src="{{ $hero->image ? asset('uploads/' . $hero->image) : 'https://images.unsplash.com/photo-1533929736458-ca588d08c8be?w=800&auto=format&fit=crop' }}" alt="Hero Image">
            <div class="tag"><span class="flag"></span> Locked on: Global</div>
            <div class="float-pill">
              <div><b>Study Permit</b><span>Avg. processing — 6 weeks</span></div>
              <div class="chev"><svg viewBox="0 0 24 24" fill="none" stroke="#071D42" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></div>
            </div>
          </div>
        </div>
      </section>
    </div>
    @endforeach
  </div>
  <div class="swiper-pagination"></div>
</div>
@endif

<!-- STRIP -->
<div class="strip">
  <div class="strip-inner">
    <span>Visa-approved destinations</span>
    <div class="flags-row">
      @foreach($countries as $country)
          <div><span class="fdot" style="background:var(--sky)"></span>{{ $country->name }}</div>
      @endforeach
    </div>
  </div>
</div>

<!-- COUNTRIES -->
<section class="sec" id="countries">
  <div class="wrap">
    <div class="sec-head">
      <div class="eyebrow-label">Where to</div>
      <h2>Pick a country, we'll lock it in</h2>
      <p>Every destination comes with its own visa category, intake calendar, and success rate — we match you to the one that fits your profile.</p>
    </div>
    <div class="countries-grid">
      @foreach($countries->take(4) as $country)
      <a class="country-card" href="{{ route('frontend.countries') }}#{{ Str::slug($country->name) }}">
        <img src="{{ $country->image ? asset('uploads/' . $country->image) : 'https://images.unsplash.com/photo-1517935706615-2717063c2225?w=500&auto=format&fit=crop' }}" alt="{{ $country->name }}">
        <div class="cc-badge">96% approval</div>
        <div class="cc-corner tl"></div><div class="cc-corner br"></div>
        <div class="cc-info"><b>{{ $country->name }}</b><span>{{ Str::limit($country->description, 30) }}</span></div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="sec services-sec" id="services">
  <div class="wrap">
    <div class="sec-head">
      <div class="eyebrow-label">What we handle</div>
      <h2>One consultant, every step of the file</h2>
      <p>No juggling agents — one dedicated counsellor owns your case from shortlisting to landing.</p>
    </div>
    <div class="services-grid">
      @foreach($services->take(4) as $service)
      <div class="service-card">
        <div class="service-icon">
            @if($service->icon)
                <img src="{{ asset('uploads/' . $service->icon) }}" alt="{{ $service->title }}" style="width: 24px; height: 24px; filter: invert(0.5) sepia(1) saturate(5) hue-rotate(180deg);">
            @else
                <svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            @endif
        </div>
        <h3>{{ $service->title }}</h3>
        <p>{{ $service->short_description }}</p>
      </div>
      @endforeach
    </div>
    <div style="text-align:center; margin-top:44px;">
      <a href="{{ route('frontend.services') }}" class="btn-ghost" style="border-color:rgba(255,255,255,0.2); color:#fff;">View all services</a>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="sec">
  <div class="wrap">
    <div class="sec-head">
      <div class="eyebrow-label">The route</div>
      <h2>From first call to boarding pass</h2>
      <p>A fixed four-step process — you always know what stage your file is at.</p>
    </div>
    <div class="process-row">
      @foreach($processes as $process)
      <div class="process-step">
          <div class="process-num">0{{ $process->step_number }}</div>
          <h3>{{ $process->title }}</h3>
          <p>{{ $process->description }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- TESTIMONIAL -->
@if($testimonials->count() > 0)
<section class="sec testi-sec">
  <div class="wrap">
    <div class="swiper testi-swiper">
      <div class="swiper-wrapper">
        @foreach($testimonials as $testi)
        <div class="swiper-slide">
          <div class="testi-card">
            <div class="testi-avatar">
                <img src="{{ $testi->avatar ? asset('uploads/testimonials/' . $testi->avatar) : 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=300&auto=format&fit=crop' }}" alt="{{ $testi->name }}">
            </div>
            <div>
              <span class="quote-mark">"</span>
              <p class="testi-text">{{ $testi->quote }}</p>
              <div class="testi-name"><b>{{ $testi->name }}</b> — {{ $testi->designation }}</div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
@endif

<!-- CTA -->
@if($cta)
<section class="cta-sec">
  <div class="cta-box">
    <div class="corner tl"></div><div class="corner tr"></div>
    <div class="corner bl"></div><div class="corner br"></div>
    <h2>{{ $cta->title }}</h2>
    <p>{{ $cta->subtitle }}</p>
    <a href="{{ $cta->button_link ?? route('frontend.apply') }}" class="btn-primary">{{ $cta->button_text ?? 'Apply now' }}
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
    </a>
  </div>
</section>
@endif

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const heroSwiper = new Swiper('.hero-swiper', {
      loop: true,
      autoHeight: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.hero-swiper .swiper-pagination',
        clickable: true,
      },
    });

    const testiSwiper = new Swiper('.testi-swiper', {
      loop: true,
      autoHeight: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.testi-swiper .swiper-pagination',
        clickable: true,
      },
    });
  });
</script>
@endpush
