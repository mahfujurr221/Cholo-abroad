<!-- FOOTER -->
<footer>
  <div class="foot-cols">
    <div class="foot-col brand">
      <a href="{{ route('frontend.home') }}" class="logo">
         @if(setting()->logo)
             <img src="{{ asset('uploads/' . setting()->logo) }}" alt="Logo" style="filter: brightness(0) invert(1);">
         @else
             <h2 style="color: #fff; margin: 0; font-size: 24px;">{{ setting()->site_name ?? 'Cholo Abroad' }}</h2>
         @endif
      </a>
      <p>Study, work, and settlement visa consultancy helping Bangladeshi students and professionals move abroad with confidence.</p>
    </div>
    <div class="foot-col">
      <h4>Destinations</h4>
      @php
         $footerCountries = \App\Models\Country::where('active_status', 1)->take(4)->get();
      @endphp
      @foreach($footerCountries as $country)
          <a href="{{ route('frontend.countries') }}#{{ Str::slug($country->name) }}">{{ $country->name }}</a>
      @endforeach
    </div>
    <div class="foot-col">
      <h4>Company</h4>
      <a href="{{ route('frontend.about') }}">About us</a>
      <a href="{{ route('frontend.services') }}">Services</a>
      <a href="{{ route('frontend.contact') }}">Contact</a>
    </div>
    <div class="foot-col">
      <h4>Get in touch</h4>
      <a href="{{ route('frontend.contact') }}">{{ setting()->address ?? 'Uttara, Dhaka, Bangladesh' }}</a>
      <a href="tel:{{ setting()->phone }}">{{ setting()->phone ?? '+880 1XXX-XXXXXX' }}</a>
      <a href="mailto:{{ setting()->email }}">{{ setting()->email ?? 'hello@choloabroad.com' }}</a>
    </div>
  </div>
  <div class="foot-bottom" style="max-width: 1200px; margin: 80px auto 0; padding-top: 24px; border-top: 1px solid rgba(255,255,255,0.1); display: flex; justify-content: space-between; font-size: 14px; color: rgba(255,255,255,0.5);">
    <span>&copy; {{ date('Y') }} {{ setting()->site_name ?? 'Cholo Abroad' }}. All rights reserved.</span>
    <span>Privacy Policy &middot; Terms of Service</span>
  </div>
</footer>
