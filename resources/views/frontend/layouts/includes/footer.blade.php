<!-- FOOTER -->
<footer>
  <div class="foot-grid" style="grid-template-columns: 1fr 1fr;">
    <div class="foot-col brand">
      <a href="{{ route('frontend.home') }}" class="foot-logo">
         @if(setting()->logo)
             <img src="{{ asset('uploads/' . setting()->logo) }}" alt="Logo" style="max-height: 72px;">
         @else
             <h2 style="color: #fff; margin: 0; font-size: 24px;">{{ setting()->site_name ?? 'Cholo Abroad' }}</h2>
         @endif
      </a>
      <p style="margin-bottom: 24px; margin-top:16px;">{{ setting()->footer_description ?? 'Study, work, and settlement visa consultancy helping Bangladeshi students and professionals move abroad with confidence.' }}</p>
      
      <!-- Social Media Icons -->
      <div style="display:flex; gap:12px;">
         <a href="{{ setting()->facebook ?? '#' }}" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.05);display:flex;align-items:center;justify-content:center;color:#fff;transition:background 0.3s;font-size:18px;" onmouseover="this.style.background='var(--sky)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'"><i class="bx bxl-facebook"></i></a>
         <a href="{{ setting()->instagram ?? '#' }}" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.05);display:flex;align-items:center;justify-content:center;color:#fff;transition:background 0.3s;font-size:18px;" onmouseover="this.style.background='var(--sky)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'"><i class="bx bxl-instagram"></i></a>
         <a href="{{ setting()->linkedin ?? '#' }}" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.05);display:flex;align-items:center;justify-content:center;color:#fff;transition:background 0.3s;font-size:18px;" onmouseover="this.style.background='var(--sky)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'"><i class="bx bxl-linkedin"></i></a>
         <a href="{{ setting()->youtube ?? '#' }}" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.05);display:flex;align-items:center;justify-content:center;color:#fff;transition:background 0.3s;font-size:18px;" onmouseover="this.style.background='var(--sky)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'"><i class="bx bxl-youtube"></i></a>
      </div>
    </div>
    
    <div class="foot-col" style="justify-self: end;">
      <h4>Get in touch</h4>
      <a href="{{ route('frontend.contact') }}" style="display:flex; gap:10px;"><i class="bx bxs-map" style="color:var(--sky); margin-top:4px; font-size:16px;"></i>{{ setting()->address ?? 'Uttara, Dhaka, Bangladesh' }}</a>
      <a href="tel:{{ setting()->phone }}" style="display:flex; gap:10px;"><i class="bx bxs-phone" style="color:var(--sky); margin-top:4px; font-size:16px;"></i>{{ setting()->phone ?? '+880 1XXX-XXXXXX' }}</a>
      <a href="mailto:{{ setting()->email }}" style="display:flex; gap:10px;"><i class="bx bxs-envelope" style="color:var(--sky); margin-top:4px; font-size:16px;"></i>{{ setting()->email ?? 'hello@choloabroad.com' }}</a>
    </div>
  </div>
  
  <div class="foot-bottom" style="max-width: 1200px; margin: 40px auto 0; padding-top: 24px; display: flex; justify-content: space-between; align-items:center; font-size: 14px; color: rgba(255,255,255,0.5);">
    <span>{!! setting()->footer_text ?? '&copy; ' . date('Y') . ' Cholo Abroad — স্বপ্ন বিদেশে, শিকড় এদেশে. All rights reserved.' !!}</span>
    <div style="display:flex; gap:16px;">
        <a href="{{ route('frontend.privacy') }}" style="transition:color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">Privacy Policy</a>
        <a href="{{ route('frontend.terms') }}" style="transition:color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">Terms of Service</a>
    </div>
  </div>
</footer>
