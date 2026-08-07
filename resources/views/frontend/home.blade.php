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
            <img src="{{ ($hero->image && file_exists(public_path('uploads/heroes/' . $hero->image))) ? asset('uploads/heroes/' . $hero->image) : 'https://images.unsplash.com/photo-1533929736458-ca588d08c8be?w=800&auto=format&fit=crop' }}" alt="Hero Image">
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
<section class="sec" id="countries" style="background:#ffffff;">
  <div class="wrap">
    <div class="sec-head">

      <h2>{!! setting()->countries_title ?? "Pick a country, we'll lock it in" !!}</h2>
      <p>{!! setting()->countries_subtitle ?? "Every destination comes with its own visa category, intake calendar, and success rate — we match you to the one that fits your profile." !!}</p>
    </div>
    <div class="countries-grid">
      @foreach($countries->take(4) as $country)
      <a class="country-card" href="{{ route('frontend.country.detail', $country->slug) }}">
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

      <h2>{!! setting()->services_title ?? "One consultant, every step of the file" !!}</h2>
      <p>{!! setting()->services_subtitle ?? "No juggling agents — one dedicated counsellor owns your case from shortlisting to landing." !!}</p>
    </div>
    <div class="services-grid">
      @foreach($services->take(4) as $service)
      <div class="service-card">
        <div class="service-icon">
            @if($service->icon)
                <i class="{{ $service->icon }}" style="font-size: 24px; color: #fff;"></i>
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
    <div class="sec-head" style="display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
      <h2 style="margin: 0; white-space: nowrap;">{!! setting()->process_title ?? "From first call to boarding pass" !!}</h2>
      <p style="margin: 0; text-align: right; max-width: 600px;">{!! setting()->process_subtitle ?? "With PFEC Global by your side, you can make the whole process a breeze!" !!}</p>
    </div>
    
    <style>
      .new-steps-container {
          display: flex;
          align-items: stretch;
          justify-content: center;
          gap: 0;
          margin-top: 60px;
          padding: 20px 0;
          flex-wrap: nowrap;
      }
      .new-step-wrapper {
          display: flex;
          align-items: center;
          gap: 0;
          flex: 1;
      }
      .new-step-card {
          background: #fff;
          border-radius: 16px;
          box-shadow: 0 8px 24px rgba(0,0,0,0.06);
          position: relative;
          flex: 1;
          min-width: 0;
          min-height: 250px;
          padding: 35px 12px 20px;
          text-align: center;
          border-bottom: 4px solid var(--step-color);
          display: flex;
          flex-direction: column;
          z-index: 1;
      }
      .new-step-card::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          width: 60px;
          height: 60px;
          border-top: 3px solid var(--step-color);
          border-left: 3px solid var(--step-color);
          border-top-left-radius: 16px;
          pointer-events: none;
      }
      .new-step-icon {
          position: absolute;
          top: -24px;
          left: 15px;
          width: 50px;
          height: 50px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          color: #fff;
          font-size: 24px;
          box-shadow: 0 6px 12px rgba(0,0,0,0.15);
      }
      .new-step-number {
          position: absolute;
          top: 15px;
          right: 15px;
          font-size: 18px;
          font-weight: 800;
          color: var(--navy);
          display: flex;
          flex-direction: column;
          align-items: center;
      }
      .new-step-number::after {
          content: '';
          width: 100%;
          height: 3px;
          background: var(--sky);
          margin-top: 2px;
          border-radius: 2px;
      }
      .new-step-title {
          font-size: 14px;
          font-weight: 700;
          color: var(--navy);
          margin: 10px 0;
          line-height: 1.4;
      }
      .new-step-divider {
          width: 60%;
          height: 1px;
          background: #e9ecf1;
          margin: 0 auto 12px;
      }
      .new-step-desc {
          font-size: 12px;
          color: var(--muted);
          line-height: 1.6;
          margin-bottom: 0;
      }
      .new-step-arrow {
          width: 36px;
          height: 36px;
          border-radius: 50%;
          background: #fff;
          border: 1.5px solid var(--sky);
          box-shadow: 0 4px 10px rgba(0,0,0,0.05);
          display: flex;
          align-items: center;
          justify-content: center;
          color: var(--sky);
          font-size: 18px;
          flex-shrink: 0;
          margin: 0 -12px; /* Negative margin pulls cards closer and overlaps them */
          z-index: 2;
          position: relative;
      }
      
      @media(max-width: 991px) {
          .new-steps-container {
              flex-wrap: wrap;
              gap: 10px; /* Reduced space between step wrappers on mobile */
          }
          .new-step-wrapper {
              flex-direction: column;
              flex: 0 0 100%;
              gap: 0;
          }
          .new-step-arrow {
              transform: rotate(90deg);
              margin: -12px auto 0; /* Overlap only top, leave bottom alone */
          }
      }
    </style>
    
    <div class="new-steps-container">
      @foreach($processes as $index => $process)
      <div class="new-step-wrapper">
          <div class="new-step-card" style="--step-color: {{ $process->color ?: 'var(--sky)' }};">
             <div class="new-step-icon" style="{{ $process->color ? 'background: '.$process->color.'; box-shadow: 0 6px 12px '.$process->color.'66;' : 'background: var(--sky); box-shadow: 0 6px 12px rgba(0,0,0,0.1);' }}">
                 <i class="{{ $process->icon ?: 'bx bx-star' }}"></i>
             </div>
             <div class="new-step-number">
                 {{ str_pad($process->step_number, 2, '0', STR_PAD_LEFT) }}
                 <span style="display:block; width:100%; height:3px; border-radius:2px; margin-top:2px; {{ $process->color ? 'background: '.$process->color.';' : 'background: var(--sky);' }}"></span>
             </div>
             
             <h3 class="new-step-title" title="{{ $process->title }}">{{ $process->title }}</h3>
             <div class="new-step-divider"></div>
             <div class="new-step-desc">{!! strip_tags($process->description) !!}</div>
          </div>
          
          @if(!$loop->last)
          <div class="new-step-arrow">
              <i class="bx bx-chevron-right"></i>
          </div>
          @endif
      </div>
      @endforeach
    </div>
  </div>
</section>


<!-- PARTNERS -->
@if($partners->count() > 0)
<section class="sec" style="background:#ffffff;">
  <div class="wrap">
    <div class="sec-head center">
      <h2 style="font-size:38px; color:#1C2646; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:12px;">{!! setting()->partners_title ?? "Australian Institutions" !!}</h2>
      <p style="color:#5D6D86; font-size:15px; max-width:680px; margin:0 auto; line-height:1.6;">{!! setting()->partners_subtitle ?? "We help international students explore Australian programs, get expert help, and apply with confidence. With Real Support From Start to Finish" !!}</p>
    </div>
    <style>
      .marquee-container {
          overflow: hidden;
          width: 100%;
          margin-top: 40px;
          display: flex;
          flex-direction: column;
          gap: 60px; /* Increased gap between rows */
      }
      .marquee-track {
          display: flex;
          width: max-content;
          animation: marquee 80s linear infinite; /* Increased from 40s to 80s to reduce speed */
      }
      .marquee-track.reverse {
          animation-direction: reverse;
      }
      .marquee-container:hover .marquee-track {
          animation-play-state: paused;
      }
      .marquee-set {
          display: flex;
          align-items: center;
          padding-right: 40px;
          gap: 40px;
      }
      @keyframes marquee {
          0% { transform: translateX(0); }
          100% { transform: translateX(-50%); }
      }
      .marquee-item img {
          max-height: 50px;
          max-width: 180px;
          object-fit: contain;
          filter: grayscale(100%);
          opacity: 0.8;
          transition: all 0.3s ease;
      }
      .marquee-item img:hover {
          filter: grayscale(0%);
          opacity: 1;
      }
      .marquee-item span {
          font-weight: 600;
          color: #5D6D86;
          font-size: 16px;
      }
    </style>
    @php
        $half = ceil($partners->count() / 2);
        $partnersRow1 = $partners->take($half);
        $partnersRow2 = $partners->skip($half);
    @endphp
    <div class="marquee-container">
      <!-- Line 1 -->
      <div class="marquee-track">
        <!-- Set 1 -->
        <div class="marquee-set">
          @for($i = 0; $i < 4; $i++)
            @foreach($partnersRow1 as $partner)
              <div class="marquee-item">
                @if($partner->logo)
                  <img src="{{ asset('uploads/partners/' . $partner->logo) }}" alt="{{ $partner->name }}">
                @else
                  <span>{{ $partner->name }}</span>
                @endif
              </div>
            @endforeach
          @endfor
        </div>
        <!-- Set 2 -->
        <div class="marquee-set">
          @for($i = 0; $i < 4; $i++)
            @foreach($partnersRow1 as $partner)
              <div class="marquee-item">
                @if($partner->logo)
                  <img src="{{ asset('uploads/partners/' . $partner->logo) }}" alt="{{ $partner->name }}">
                @else
                  <span>{{ $partner->name }}</span>
                @endif
              </div>
            @endforeach
          @endfor
        </div>
      </div>
      
      <!-- Line 2 -->
      @if($partnersRow2->count() > 0)
      <div class="marquee-track reverse">
        <!-- Set 1 -->
        <div class="marquee-set">
          @for($i = 0; $i < 4; $i++)
            @foreach($partnersRow2 as $partner)
              <div class="marquee-item">
                @if($partner->logo)
                  <img src="{{ asset('uploads/partners/' . $partner->logo) }}" alt="{{ $partner->name }}">
                @else
                  <span>{{ $partner->name }}</span>
                @endif
              </div>
            @endforeach
          @endfor
        </div>
        <!-- Set 2 -->
        <div class="marquee-set">
          @for($i = 0; $i < 4; $i++)
            @foreach($partnersRow2 as $partner)
              <div class="marquee-item">
                @if($partner->logo)
                  <img src="{{ asset('uploads/partners/' . $partner->logo) }}" alt="{{ $partner->name }}">
                @else
                  <span>{{ $partner->name }}</span>
                @endif
              </div>
            @endforeach
          @endfor
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
@endif

<!-- TESTIMONIAL -->
@if($testimonials->count() > 0)
<section class="sec testi-sec" style="background:var(--bg);">
  <div class="wrap">
    <div class="sec-head center">
      <h2>{!! setting()->testimonials_title ?? "Students who trusted us with their future" !!}</h2>
      @if(setting()->testimonials_subtitle)
          <p>{!! setting()->testimonials_subtitle !!}</p>
      @endif
    </div>
    
    <style>
      .new-testi-card {
          background: #fff;
          border-radius: 20px;
          box-shadow: 0 4px 20px rgba(0,0,0,0.04);
          padding: 30px;
          display: flex;
          flex-direction: column;
          height: 100%;
          text-align: left;
      }
      .new-testi-top {
          position: relative;
          display: flex;
          align-items: center;
          gap: 16px;
          margin-bottom: 20px;
      }
      .new-testi-country {
          position: absolute;
          top: 0;
          right: 0;
          background: #f8f9fa;
          padding: 4px 12px;
          border-radius: 20px;
          font-size: 12px;
          font-weight: 600;
          color: var(--navy);
          display: flex;
          align-items: center;
          gap: 6px;
      }
      .new-testi-avatar {
          width: 70px;
          height: 70px;
          border-radius: 50%;
          object-fit: cover;
          flex-shrink: 0;
      }
      .new-testi-info {
          padding-top: 20px; /* Push name down to clear absolute country badge if they collide */
      }
      .new-testi-info h4 {
          font-size: 17px;
          font-weight: 800;
          color: var(--navy);
          margin: 0 0 4px 0;
      }
      .new-testi-info p {
          font-size: 13px;
          color: var(--muted);
          margin: 0;
      }
      .new-testi-divider {
          height: 1px;
          background: #f0f2f5;
          margin: 0 -30px 20px;
      }
      .new-testi-middle {
          display: flex;
          align-items: center;
          gap: 16px;
          margin-bottom: 20px;
      }
      .new-testi-icon-wrap {
          width: 45px;
          height: 45px;
          border-radius: 50%;
          background: #f0f6ff;
          display: flex;
          align-items: center;
          justify-content: center;
          color: var(--sky);
          font-size: 24px;
          flex-shrink: 0;
      }
      .new-testi-program {
          font-size: 13px;
          color: var(--sky);
          font-weight: 600;
          margin: 0 0 2px 0;
      }
      .new-testi-uni {
          font-size: 15px;
          font-weight: 700;
          color: var(--navy);
          margin: 0;
      }
      .new-testi-bottom {
          display: flex;
          gap: 12px;
          align-items: flex-start;
          flex-grow: 1;
      }
      .new-testi-quote-icon {
          font-size: 32px;
          color: var(--sky);
          line-height: 1;
          margin-top: -5px;
      }
      .new-testi-text {
          font-size: 14px;
          color: var(--navy);
          line-height: 1.7;
          margin: 0;
      }
    </style>
    
    <div style="position: relative;">
      <div class="swiper testi-swiper">
        <div class="swiper-wrapper">
          @foreach($testimonials as $testi)
          <div class="swiper-slide" style="height: auto;">
            <div class="new-testi-card">
              
              <div class="new-testi-top">
                @if($testi->country_name)
                <div class="new-testi-country">
                    <i class="bx bx-globe"></i> {{ $testi->country_name }}
                </div>
                @endif
                <img src="{{ $testi->avatar ? asset('uploads/testimonials/' . $testi->avatar) : 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=300&auto=format&fit=crop' }}" alt="{{ $testi->name }}" class="new-testi-avatar">
                <div class="new-testi-info" style="{{ !$testi->country_name ? 'padding-top:0;' : '' }}">
                  <h4>{{ $testi->name }}</h4>
                  <p>{{ $testi->past_school ?? $testi->designation }}</p>
                </div>
              </div>

              <div class="new-testi-divider"></div>

              @if($testi->program || $testi->university)
              <div class="new-testi-middle">
                <div class="new-testi-icon-wrap">
                    <i class="bx bx-graduation"></i>
                </div>
                <div>
                    @if($testi->program)<p class="new-testi-program">{{ $testi->program }}</p>@endif
                    @if($testi->university)<h5 class="new-testi-uni">{{ $testi->university }}</h5>@endif
                </div>
              </div>
              <div class="new-testi-divider"></div>
              @endif

              <div class="new-testi-bottom">
                <div class="new-testi-quote-icon">
                    <i class="bx bxs-quote-alt-left"></i>
                </div>
                <div class="new-testi-text">
                    @php 
                      $fullText = strip_tags($testi->quote); 
                      $isLong = strlen($fullText) > 180;
                    @endphp
                    @if($isLong)
                      <span class="short-text">{{ \Illuminate\Support\Str::limit($fullText, 180) }}</span>
                      <span class="full-text" style="display:none;">
                          {{ $fullText }}
                          <a href="javascript:void(0)" onclick="var p=this.closest('.new-testi-text'); p.querySelector('.full-text').style.display='none'; p.querySelector('.short-text').style.display='inline'; p.querySelector('.see-more-btn').style.display='inline';" style="color:var(--sky); font-weight:600; font-size:13px; margin-left:4px;">See less</a>
                      </span>
                      <a href="javascript:void(0)" class="see-more-btn" onclick="var p=this.closest('.new-testi-text'); p.querySelector('.short-text').style.display='none'; p.querySelector('.full-text').style.display='inline'; this.style.display='none';" style="color:var(--sky); font-weight:600; font-size:13px; margin-left:4px;">See more</a>
                    @else
                      {{ $fullText }}
                    @endif
                </div>
              </div>

            </div>
          </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
      
      <!-- Navigation Buttons -->
      <div class="swiper-button-prev ac-nav-prev"></div>
      <div class="swiper-button-next ac-nav-next"></div>
    </div>

  </div>
</section>
@endif

{{-- 
<!-- FAQ PREVIEW -->
@if($faqs->count() > 0)
<section class="sec tight" style="background:#fff;">
  <div class="wrap">
    <div class="sec-head center">

      <h2>{!! setting()->faq_title ?? "Frequently Asked Questions" !!}</h2>
      @if(setting()->faq_subtitle)
          <p>{!! setting()->faq_subtitle !!}</p>
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
--}}

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
      slidesPerView: 1,
      spaceBetween: 24,
      breakpoints: {
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.testi-swiper .swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.ac-nav-next',
        prevEl: '.ac-nav-prev',
      }
    });
  });
</script>
@endpush
