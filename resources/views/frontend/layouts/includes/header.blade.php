<!-- NAV -->
<div class="nav-shell">
  <nav>
    <a href="{{ route('frontend.home') }}" class="logo">
        @if(setting()->logo)
            <img src="{{ asset('uploads/' . setting()->logo) }}" alt="{{ setting()->site_name ?? 'Cholo Abroad' }}">
        @else
            <h2 style="color: var(--navy); margin: 0; font-size: 24px;">{{ setting()->site_name ?? 'Cholo Abroad' }}</h2>
        @endif
    </a>
    <div class="nav-links">
      <a href="{{ route('frontend.home') }}" class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}">Home</a>
      <div class="dd">
        <div class="dd-trigger">Country <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></div>
        <div class="dd-menu">
          @php
             $headerCountries = \Illuminate\Support\Facades\Cache::rememberForever('frontend_header_countries', fn() => \App\Models\Country::where('active_status', 1)->get());
          @endphp
          @foreach($headerCountries as $country)
              <a href="{{ route('frontend.country.detail', $country->slug) }}">
                  @if($country->flag_icon)
                      @if(preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $country->flag_icon))
                          <img src="{{ asset('uploads/countries/' . $country->flag_icon) }}" style="width: 18px; height: 18px; border-radius: 50%; object-fit: cover;">
                      @else
                          <span style="font-size: 16px; line-height: 1;">{{ $country->flag_icon }}</span>
                      @endif
                  @else
                      <span class="fdot" style="background:var(--sky)"></span>
                  @endif
                  {{ $country->name }}
              </a>
          @endforeach
          <a href="{{ route('frontend.countries') }}" class="seeall">View all destinations &rarr;</a>
        </div>
      </div>
      <a href="{{ route('frontend.services') }}" class="{{ request()->routeIs('frontend.services') ? 'active' : '' }}">Service</a>
      <a href="{{ route('frontend.about') }}" class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">About</a>
      {{-- <a href="{{ route('frontend.faq') }}" class="{{ request()->routeIs('frontend.faq') ? 'active' : '' }}">FAQ</a> --}}
      <a href="{{ route('frontend.contact') }}" class="{{ request()->routeIs('frontend.contact') ? 'active' : '' }}">Contact</a>
    </div>
    <button class="mobile-toggle"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg></button>
    <a href="{{ route('frontend.apply') }}" class="apply-btn">
      <span class="apply-text">Apply now</span>
      <span class="circ"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></span>
    </a>
  </nav>
</div>
