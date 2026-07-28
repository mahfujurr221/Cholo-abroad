@extends('frontend.layouts.master')

@section('title', 'Contact Us - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">
  <div class="breadcrumb"><a href="{{ route('frontend.home') }}">Home</a> / <span class="cur">Contact</span></div>
  <div class="eyebrow-label">Get in touch</div>
  <h1>Talk to a <span style="color:var(--sky)">counsellor</span> directly</h1>
  <p>Visit our Dhaka office, call, or send a message — we reply within one business day.</p>
</div>

<section class="sec tight">
  <div class="wrap">
    <div class="contact-grid">

      <!-- LEFT: info + map -->
      <div style="display:flex; flex-direction:column; gap:24px;">
        <div class="contact-panel">
          <h3>Contact details</h3>
          <div class="side-info">
            <div class="info-item">
              <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
              <div><b>Office address</b><span>{{ setting()->address ?? 'House 14, Road 9, Sector 4, Uttara, Dhaka 1230, Bangladesh' }}</span></div>
            </div>
            <div class="info-item">
              <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg></div>
              <div><b>Phone</b><span>{{ setting()->phone ?? '+880 1XXX-XXXXXX' }}</span></div>
            </div>
            <div class="info-item">
              <div class="ic"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M22 6l-10 7L2 6"/></svg></div>
              <div><b>Email</b><span>{{ setting()->email ?? 'hello@choloabroad.com' }}</span></div>
            </div>
          </div>
          <div class="office-hours">
            <div class="row"><span>Saturday – Thursday</span><b>10:00 AM – 7:00 PM</b></div>
            <div class="row"><span>Friday</span><b>Closed</b></div>
          </div>
        </div>

        <div class="map-block">
          <iframe src="https://www.google.com/maps?q={{ urlencode(setting()->address ?? 'Uttara, Dhaka, Bangladesh') }}&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <!-- RIGHT: quick message form -->
      <div class="contact-form-panel">
        <h3>Send us a message</h3>
        <form>
          <div class="form-row">
            <div class="form-field"><label>Full name</label><input type="text" placeholder="Your name" required></div>
            <div class="form-field"><label>Phone number</label><input type="tel" placeholder="+880 1XXX-XXXXXX" required></div>
          </div>
          <div class="form-row">
            <div class="form-field full"><label>Email address</label><input type="email" placeholder="you@email.com" required></div>
          </div>
          <div class="form-row">
            <div class="form-field full"><label>What can we help with?</label>
              <select required>
                <option value="">Select a topic</option>
                <option>Country & visa guidance</option>
                <option>Document review</option>
                <option>Existing application status</option>
                <option>Something else</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-field full"><label>Message</label><textarea placeholder="Tell us a bit about your situation..." required></textarea></div>
          </div>
          <button type="button" class="btn-primary form-submit">Send message
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

@endsection
