@extends('frontend.layouts.master')

@section('title', 'FAQs - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">
  {{-- <div class="breadcrumb"><a href="{{ route('frontend.home') }}">Home</a> / <span class="cur">FAQs</span></div> --}}

  <h1>Frequently Asked <span style="color:var(--sky)">Questions</span></h1>
  <p>Everything you need to know about our services, visa processes, and what to expect when you apply with us.</p>
</div>

<section class="sec" style="background:var(--bg);">
  <div class="wrap">
    <div class="faq-list" style="max-width:800px; margin:0 auto;">
      @forelse($faqs as $faq)
      <div class="faq-item">
        <div class="faq-q">
          <h3>{{ $faq->question }}</h3>
          <div class="plus"></div>
        </div>
        <div class="faq-a">
          <p>{!! nl2br(e($faq->answer)) !!}</p>
        </div>
      </div>
      @empty
      <div style="text-align:center; padding: 40px; color:var(--muted);">
          <p>No FAQs available right now. Please check back later.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- CTA -->
@if(isset($cta) && $cta)
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
