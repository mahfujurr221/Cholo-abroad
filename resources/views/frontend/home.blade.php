@extends('frontend.layouts.master')

@section('title', 'Home - ' . (setting()->site_name ?? 'Cholo Abroad'))

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<style>
  .hero-swiper { width: 100%; overflow: hidden; position: relative; }
  .testi-swiper { width: 100%; overflow: hidden; padding-bottom: 40px; position: relative; }
  .swiper-pagination-bullet-active { background: var(--sky); }
  .hero-swiper .swiper-pagination { bottom: 10px; }
  /* About preview */
  .about-preview{display:grid; grid-template-columns:1fr 1fr; gap:56px; align-items:center;}
  .about-preview .visual{position:relative; height:420px;}
  .about-preview .frame{position:absolute; inset:24px; border-radius:20px; overflow:hidden;}
  .about-preview .frame img{width:100%;height:100%;object-fit:cover;}
  .about-preview h2{font-size:34px; color:var(--navy); font-weight:800; letter-spacing:-0.5px; margin-bottom:16px;}
  .about-preview p{color:var(--muted); font-size:15.5px; line-height:1.7; margin-bottom:12px;}
  .mv-grid{display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-top:24px;}
  .mv-card{background:var(--bg); border-radius:14px; padding:20px; border:1px solid var(--line);}
  .mv-card .label{font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:1px; color:var(--sky); margin-bottom:6px;}
  .mv-card p{font-size:13.5px; color:var(--muted); line-height:1.6; margin:0;}
  @media(max-width:980px){
    .about-preview{grid-template-columns:1fr;}
    .about-preview .visual{height:280px;}
    .mv-grid{grid-template-columns:1fr;}
  }
</style>
@endpush

@section('content')

@if($heroes->count() > 0)
<!-- HERO -->
<div class="swiper hero-swiper">
  <div class="swiper-wrapper">
    @foreach($heroes as $hero)
    <div class="swiper-slide">
      <section class="hero">
        <div>
          <h1>{!! nl2br(e($hero->title)) !!}</h1>
          <p class="sub">{!! $hero->description !!}</p>
          <div class="hero-ctas">
            <a href="{{ $hero->button_link ?? route('frontend.apply') }}" class="btn-primary">{{ $hero->button_text ?? 'Start free assessment' }}
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
            </a>
          </div>
          {{-- <div class="hero-stats">
            <div class="stat"><b>96%</b><span>Visa approval rate</span></div>
            <div class="stat"><b>{{ $countries->count() }}+</b><span>Destination countries</span></div>
            <div class="stat"><b>12k+</b><span>Applications filed</span></div>
          </div> --}}
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
{{-- <div class="strip">
  <div class="strip-inner">
    <span>Visa-approved destinations</span>
    <div class="flags-row">
      @foreach($countries as $country)
          <div>
            <span class="fdot" style="background:var(--sky)">
              @if($country->flag_icon)
                @if(preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $country->flag_icon))
                  <img src="{{ asset('uploads/countries/' . $country->flag_icon) }}" style="width: 14px; height: 14px; object-fit: cover; border-radius: 50%;">
                @else
                  {{ $country->flag_icon }}
                @endif
              @endif
            </span>
            {{ $country->name }}
          </div>
      @endforeach
    </div>
  </div>
</div> --}}

<!-- COUNTRIES -->
<section class="sec" id="countries">
  <div class="wrap">
    <div class="sec-head">

      <h2>{{ setting()->countries_title ?? "Pick a country, we'll lock it in" }}</h2>
      <p>{{ setting()->countries_subtitle ?? "Every destination comes with its own visa category, intake calendar, and success rate — we match you to the one that fits your profile." }}</p>
    </div>
    <div class="countries-grid">
      @foreach($countries->take(4) as $country)
      <a class="country-card" href="{{ route('frontend.countries') }}#{{ Str::slug($country->name) }}">
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
          <span>{!! Str::limit(strip_tags($country->description), 45) !!}</span>
        </div>
      </a>
      @endforeach
    </div>
    <div style="text-align:center; margin-top:32px;">
      <a href="{{ route('frontend.countries') }}" class="btn-ghost">View all {{ $countries->count() }} destinations →</a>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="sec services-sec" id="services">
  <div class="wrap">
    <div class="sec-head">

      <h2>{{ setting()->services_title ?? "One consultant, every step of the file" }}</h2>
      <p>{{ setting()->services_subtitle ?? "No juggling agents — one dedicated counsellor owns your case from shortlisting to landing." }}</p>
    </div>
    <div class="services-grid">
      @foreach($services->take(4) as $service)
      <div class="service-card">
        <div class="service-icon">
            @if($service->icon)
                <img src="{{ asset('uploads/' . $service->icon) }}" alt="{{ $service->title }}" style="width: 24px; height: 24px; filter: invert(1);">
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
      <a href="{{ route('frontend.services') }}" class="btn-ghost" style="border-color:rgba(255,255,255,0.2); color:#fff;">View all services →</a>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="sec">
  <div class="wrap">
    <div class="sec-head">

      <h2>{{ setting()->process_title ?? "From first call to boarding pass" }}</h2>
      <p>{{ setting()->process_subtitle ?? "A fixed four-step process — you always know what stage your file is at." }}</p>
    </div>
    <div class="process-row">
      @foreach($processes as $process)
      <div class="process-step">
          <div class="process-num">0{{ $process->step_number }}</div>
          <h3>{{ $process->title }}</h3>
          <div>{!! $process->description !!}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ABOUT PREVIEW -->
@if($about)
<section class="sec" style="background:var(--bg);">
  <div class="wrap">
    <div class="about-preview">
      <div class="visual">
        <div class="corner tl" style="border-color:var(--sky);"></div>
        <div class="corner br" style="border-color:var(--gold);"></div>
        <div class="frame">
          <img src="{{ $about->image1 ? asset('uploads/'.$about->image1) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=700&auto=format&fit=crop' }}" alt="Cholo Abroad team">
        </div>
      </div>
      <div>

        <h2>{{ setting()->about_title ?? $about->title }}</h2>
        @if(setting()->about_subtitle)
            <p>{{ setting()->about_subtitle }}</p>
        @endif
        @if($about->description)
          <p>{{ Str::limit(strip_tags($about->description), 280) }}</p>
        @endif
        @if($about->mission || $about->vision)
        <div class="mv-grid">
          @if($about->mission)
          <div class="mv-card">
            <div class="label">Mission</div>
            <p>{{ Str::limit($about->mission, 100) }}</p>
          </div>
          @endif
          @if($about->vision)
          <div class="mv-card">
            <div class="label">Vision</div>
            <p>{{ Str::limit($about->vision, 100) }}</p>
          </div>
          @endif
        </div>
        @endif
        <div style="margin-top:28px; display:flex; gap:14px; flex-wrap:wrap;">
          <a href="{{ route('frontend.about') }}" class="btn-primary">Our story
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </a>
          <a href="{{ route('frontend.contact') }}" class="btn-ghost">Get in touch</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- TESTIMONIAL -->
@if($testimonials->count() > 0)
<section class="sec testi-sec">
  <div class="wrap">
    <div class="sec-head center">

      <h2>{{ setting()->testimonials_title ?? "Students who trusted us with their future" }}</h2>
      @if(setting()->testimonials_subtitle)
          <p>{{ setting()->testimonials_subtitle }}</p>
      @endif
    </div>
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

<!-- FAQ PREVIEW -->
@if($faqs->count() > 0)
<section class="sec tight" style="background:#fff;">
  <div class="wrap">
    <div class="sec-head center">

      <h2>{{ setting()->faq_title ?? "Frequently Asked Questions" }}</h2>
      @if(setting()->faq_subtitle)
          <p>{{ setting()->faq_subtitle }}</p>
      @endif
    </div>
    <div style="max-width:780px; margin:0 auto;">
      @foreach($faqs->take(5) as $faq)
      <div class="faq-item">
        <div class="faq-q">
          <h3>{{ $faq->question }}</h3>
          <div class="plus"></div>
        </div>
        <div class="faq-a">
          <p>{{ $faq->answer }}</p>
        </div>
      </div>
      @endforeach
    </div>
    <div style="text-align:center; margin-top:36px;">
      <a href="{{ route('frontend.about') }}#faqs" class="btn-ghost">See all questions →</a>
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
