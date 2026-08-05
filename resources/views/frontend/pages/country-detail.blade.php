@extends('frontend.layouts.master')

@section('title', $country->name . ' — Study & Visa Guide - ' . (setting()->site_name ?? 'Cholo Abroad'))
@section('meta_description', Str::limit(strip_tags($country->description ?? 'Explore study and visa opportunities in ' . $country->name . ' with Cholo Abroad.'), 160))

@push('css')
<style>
  /* ── Country Hero ───────────────────────── */
  .country-hero {
    position: relative;
    height: 520px;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
  }
  .country-hero img.ch-bg {
    position: absolute; inset: 0; width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 8s ease;
  }
  .country-hero:hover img.ch-bg { transform: scale(1.04); }
  .country-hero .ch-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(10,17,40,0.92) 0%, rgba(10,17,40,0.4) 60%, transparent 100%);
  }
  .country-hero .ch-content {
    position: relative; z-index: 2;
    width: 100%; padding: 56px 0 48px;
  }
  .ch-breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 13px; color: rgba(255,255,255,0.6); margin-bottom: 16px; }
  .ch-breadcrumb a { color: rgba(255,255,255,0.6); text-decoration: none; transition: color 0.2s; }
  .ch-breadcrumb a:hover { color: #fff; }
  .ch-breadcrumb span { color: rgba(255,255,255,0.35); }
  .country-hero h1 { font-size: clamp(36px, 5vw, 58px); font-weight: 800; color: #fff; margin-bottom: 14px; letter-spacing: -1px; }
  .ch-flag { display: inline-flex; align-items: center; gap: 10px; margin-bottom: 16px; }
  .ch-flag img { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.3); }
  .ch-flag span { font-size: 13px; color: rgba(255,255,255,0.7); font-weight: 500; letter-spacing: 1px; text-transform: uppercase; }

  /* ── Stats Bar ───────────────────────────── */
  .stats-bar {
    background: #fff;
    border-bottom: 1px solid var(--line);
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    position: sticky; top: 0; z-index: 90;
  }
  .stats-bar .wrap { display: flex; align-items: stretch; }
  .stats-bar .sb-item {
    flex: 1; padding: 20px 28px;
    border-right: 1px solid var(--line);
    display: flex; flex-direction: column; gap: 4px;
  }
  .stats-bar .sb-item:last-child { border-right: none; }
  .stats-bar .sb-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); }
  .stats-bar .sb-value { font-size: 22px; font-weight: 800; color: var(--navy); }
  .stats-bar .sb-value.highlight { color: var(--sky); }

  /* ── Main Layout ─────────────────────────── */
  .country-detail-layout {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 48px;
    align-items: start;
  }
  @media(max-width: 980px) {
    .country-detail-layout { grid-template-columns: 1fr; }
    .country-hero { height: 360px; }
    .stats-bar .wrap { flex-wrap: wrap; }
    .stats-bar .sb-item { min-width: 50%; border-bottom: 1px solid var(--line); }
  }
  @media(max-width: 580px) {
    .stats-bar .sb-item { min-width: 100%; }
  }

  /* ── Content Sections ────────────────────── */
  .cd-section { margin-bottom: 48px; }
  .cd-section h2 {
    font-size: 24px; font-weight: 800; color: var(--navy);
    margin-bottom: 20px; padding-bottom: 14px;
    border-bottom: 2px solid var(--line); position: relative;
  }
  .cd-section h2::after {
    content: ''; position: absolute; left: 0; bottom: -2px;
    width: 48px; height: 2px; background: var(--sky); border-radius: 2px;
  }
  .cd-section p { color: var(--muted); font-size: 15px; line-height: 1.8; margin-bottom: 14px; }


  /* ── Sidebar ─────────────────────────────── */
  .cd-sidebar { position: sticky; top: 80px; }
  .sidebar-card {
    background: #fff; border: 1px solid var(--line); border-radius: 20px;
    overflow: hidden; margin-bottom: 24px;
  }
  .sidebar-card .sc-header {
    padding: 18px 22px; border-bottom: 1px solid var(--line);
    font-size: 13px; font-weight: 700; text-transform: uppercase;
    letter-spacing: 1px; color: var(--navy);
    display: flex; align-items: center; gap: 8px;
  }
  .sidebar-card .sc-header i { color: var(--sky); font-size: 16px; }
  .sidebar-card .sc-body { padding: 16px; }

  /* Apply CTA sidebar */
  .apply-cta-card {
    background: linear-gradient(135deg, var(--navy) 0%, #1a3066 100%);
    border-radius: 20px; padding: 30px 24px; text-align: center; margin-bottom: 24px;
  }
  .apply-cta-card h3 { color: #fff; font-size: 20px; font-weight: 800; margin-bottom: 10px; }
  .apply-cta-card p { color: rgba(255,255,255,0.7); font-size: 14px; line-height: 1.6; margin-bottom: 22px; }

  /* Other countries list */
  .other-country-item {
    display: flex; align-items: center; gap: 14px;
    padding: 12px 0; border-bottom: 1px solid var(--line);
    text-decoration: none; transition: all 0.2s;
  }
  .other-country-item:last-child { border-bottom: none; }
  .other-country-item:hover { padding-left: 6px; }
  .other-country-item img { width: 42px; height: 42px; border-radius: 10px; object-fit: cover; flex-shrink: 0; }
  .other-country-item .oci-info span { font-size: 11px; color: var(--muted); }
  .other-country-item .oci-info b { display: block; font-size: 14px; font-weight: 700; color: var(--navy); transition: color 0.2s; }
  .other-country-item:hover .oci-info b { color: var(--sky); }
</style>
@endpush

@section('content')

{{-- ─── HERO ──────────────────────────────────────────────────────── --}}
<div class="country-hero">
  <img class="ch-bg" 
    src="{{ $country->image ? asset('uploads/countries/' . $country->image) : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1400&auto=format&fit=crop' }}" 
    alt="{{ $country->name }}">
  <div class="ch-overlay"></div>
  <div class="ch-content">
    <div class="wrap">
      <div class="ch-breadcrumb">
        <a href="{{ route('frontend.home') }}">Home</a>
        <span>/</span>
        <a href="{{ route('frontend.countries') }}">Countries</a>
        <span>/</span>
        <span style="color:rgba(255,255,255,0.8);">{{ $country->name }}</span>
      </div>

      @if($country->flag_icon)
      <div class="ch-flag">
        @if(preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $country->flag_icon))
          <img src="{{ asset('uploads/countries/' . $country->flag_icon) }}" alt="{{ $country->name }} flag">
        @else
          <span style="font-size:28px; line-height:1;">{{ $country->flag_icon }}</span>
        @endif
        <span>{{ $country->name }}</span>
      </div>
      @endif

      <h1>Study & Live in <br><span style="color:var(--sky);">{{ $country->name }}</span></h1>

      @if($country->approval_rate)
      <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.2); border-radius:30px; padding:8px 18px; backdrop-filter:blur(10px);">
        <i class="bx bx-check-shield" style="color:#4ade80; font-size:18px;"></i>
        <span style="font-size:14px; color:#fff; font-weight:600;">{{ $country->approval_rate }} Visa Approval Rate</span>
      </div>
      @endif
    </div>
  </div>
</div>

{{-- ─── STATS BAR ─────────────────────────────────────────────────── --}}
<div class="stats-bar">
  <div class="wrap">
    @if($country->approval_rate)
    <div class="sb-item">
      <div class="sb-label"><i class="bx bx-shield-check me-1"></i> Approval Rate</div>
      <div class="sb-value highlight">{{ $country->approval_rate }}</div>
    </div>
    @endif
    <div class="sb-item">
      <div class="sb-label"><i class="bx bx-help-circle me-1"></i> Country FAQs</div>
      <div class="sb-value">{{ $faqs->count() }}</div>
    </div>
    <div class="sb-item">
      <div class="sb-label"><i class="bx bx-book-open me-1"></i> Free Assessment</div>
      <div class="sb-value" style="font-size:15px; padding-top:4px;">
        <a href="{{ route('frontend.apply') }}" class="btn-primary" style="padding:8px 20px; font-size:13px;">Apply Now →</a>
      </div>
    </div>
    <div class="sb-item">
      <div class="sb-label"><i class="bx bx-phone me-1"></i> Talk to an Expert</div>
      <div class="sb-value" style="font-size:15px; padding-top:4px;">
        <a href="{{ route('frontend.contact') }}" class="btn-ghost" style="padding:8px 20px; font-size:13px;">Contact Us</a>
      </div>
    </div>
  </div>
</div>

{{-- ─── MAIN CONTENT ───────────────────────────────────────────────── --}}
<section class="sec" style="background:#fff;">
  <div class="wrap">
    <div class="country-detail-layout">

      {{-- LEFT COLUMN --}}
      <div>

        {{-- About --}}
        @if($country->description)
        <div class="cd-section">
          <h2>About {{ $country->name }}</h2>
          <div style="color:var(--muted); font-size:15px; line-height:1.8;">
            {!! $country->description !!}
          </div>
        </div>
        @endif

        {{-- FAQ Section --}}
        @if($faqs->count() > 0)
        <div class="cd-section">
          <h2>Frequently Asked Questions</h2>
          @foreach($faqs as $i => $faq)
          <div class="faq-item {{ $i === 0 ? 'open' : '' }}">
            <div class="faq-q">
              <h3>{{ $faq->question }}</h3>
              <div class="plus"></div>
            </div>
            <div class="faq-a">
              <p>{!! $faq->answer !!}</p>
            </div>
          </div>
          @endforeach
        </div>
        @endif

        {{-- CTA Banner --}}
        @if($cta)
        <div style="background:linear-gradient(135deg, var(--navy), #1a3066); border-radius:20px; padding:40px; display:flex; align-items:center; justify-content:space-between; gap:24px; flex-wrap:wrap;">
          <div>
            <h3 style="font-size:22px; font-weight:800; color:#fff; margin-bottom:8px;">{{ $cta->title }}</h3>
            <p style="color:rgba(255,255,255,0.7); font-size:15px; margin:0;">{{ $cta->subtitle }}</p>
          </div>
          <a href="{{ $cta->button_link ?? route('frontend.apply') }}" class="btn-primary" style="white-space:nowrap;">
            {{ $cta->button_text ?? 'Apply Now' }}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </a>
        </div>
        @else
        <div style="background:linear-gradient(135deg, var(--navy), #1a3066); border-radius:20px; padding:40px; display:flex; align-items:center; justify-content:space-between; gap:24px; flex-wrap:wrap;">
          <div>
            <h3 style="font-size:22px; font-weight:800; color:#fff; margin-bottom:8px;">Ready to move to {{ $country->name }}?</h3>
            <p style="color:rgba(255,255,255,0.7); font-size:15px; margin:0;">Take our free assessment — we'll tell you honestly if you're a good fit.</p>
          </div>
          <a href="{{ route('frontend.apply') }}" class="btn-primary" style="white-space:nowrap;">
            Start Free Assessment
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </a>
        </div>
        @endif

      </div>

      {{-- RIGHT SIDEBAR --}}
      <div class="cd-sidebar">

        {{-- Apply CTA --}}
        <div class="apply-cta-card">
          <div style="width:60px; height:60px; border-radius:50%; background:rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
            <i class="bx bx-paper-plane" style="font-size:28px; color:#fff;"></i>
          </div>
          <h3>Get Your Free Assessment</h3>
          <p>Tell us your profile — we'll match you to the right visa and university path in {{ $country->name }}.</p>
          <a href="{{ route('frontend.apply') }}" class="btn-primary" style="width:100%; justify-content:center;">
            Apply Now
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </a>
          <a href="{{ route('frontend.contact') }}" style="display:block; margin-top:12px; color:rgba(255,255,255,0.7); font-size:13px; text-decoration:none;">
            Or talk to a counsellor →
          </a>
        </div>

        {{-- Quick Info --}}
        @if($country->approval_rate)
        <div class="sidebar-card">
          <div class="sc-header"><i class="bx bx-info-circle"></i> Quick Info</div>
          <div class="sc-body">
            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 0; border-bottom:1px solid var(--line);">
              <span style="font-size:13px; color:var(--muted);">Approval Rate</span>
              <span style="font-size:14px; font-weight:700; color:var(--sky);">{{ $country->approval_rate }}</span>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 0; border-bottom:1px solid var(--line);">
              <span style="font-size:13px; color:var(--muted);">Country FAQs</span>
              <span style="font-size:14px; font-weight:700; color:var(--navy);">{{ $faqs->count() }}</span>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 0;">
              <span style="font-size:13px; color:var(--muted);">Support</span>
              <span style="font-size:14px; font-weight:700; color:#10b981;">Available</span>
            </div>
          </div>
        </div>
        @endif

        {{-- Other Countries --}}
        @php $otherCountries = $countries->where('id', '!=', $country->id)->take(5); @endphp
        @if($otherCountries->count() > 0)
        <div class="sidebar-card">
          <div class="sc-header"><i class="bx bx-globe"></i> Explore Other Countries</div>
          <div class="sc-body">
            @foreach($otherCountries as $other)
            <a href="{{ route('frontend.country.detail', $other->slug) }}" class="other-country-item">
              <img src="{{ $other->image ? asset('uploads/countries/' . $other->image) : 'https://images.unsplash.com/photo-1517935706615-2717063c2225?w=200&auto=format&fit=crop' }}" alt="{{ $other->name }}">
              <div class="oci-info">
                <b>{{ $other->name }}</b>
                @if($other->approval_rate)
                <span>{{ $other->approval_rate }} approval</span>
                @else
                <span>Explore now →</span>
                @endif
              </div>
            </a>
            @endforeach
          </div>
        </div>
        @endif

      </div>
    </div>
  </div>
</section>

@endsection
