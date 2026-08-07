@extends('frontend.layouts.master')

@section('title', 'Apply Now - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">


  <h1>Let's lock in your <span style="color:var(--sky)">country</span></h1>
  <p>Three short steps. A counsellor reviews your form and calls you within one business day.</p>
</div>

<section class="sec tight" style="padding-top:10px;">
  <div class="wrap">
    <div class="form-shell">

      <form id="applyForm">
        @csrf
        <div class="form-step active">
          <h2 style="font-size:22px; color:var(--navy); margin:10px 0 24px;">Send us an inquiry</h2>
          
          <div class="form-row">
            <div class="form-field"><label>FULL NAME <span class="text-danger">*</span></label><input type="text" name="name" placeholder="Full Name" required></div>
            <div class="form-field"><label>EMAIL <span class="text-danger">*</span></label><input type="email" name="email" placeholder="Email Address" required></div>
          </div>
          
          <div class="form-row">
            <div class="form-field"><label>PHONE/MOBILE <span class="text-danger">*</span></label><input type="tel" name="phone" placeholder="Mobile Number" required></div>
            <div class="form-field"><label>CURRENT EDUCATION LEVEL <span class="text-danger">*</span></label>
              <select name="highest_education" required>
                <option value="">- SELECT -</option>
                <option value="SSC / O-Level">SSC / O-Level</option>
                <option value="HSC / A-Level">HSC / A-Level</option>
                <option value="Bachelor's">Bachelor's</option>
                <option value="Master's">Master's</option>
              </select>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-field"><label>PREFERRED COUNTRY <span class="text-danger">*</span></label>
              <select name="preferred_country" required>
                <option value="">- SELECT -</option>
                @php $applyCountries = \Illuminate\Support\Facades\Cache::rememberForever('frontend_apply_countries', fn() => \App\Models\Country::where('active_status', 1)->get()); @endphp
                @foreach($applyCountries as $c)
                <option value="{{ $c->name }}">{{ $c->name }}</option>
                @endforeach
                <option value="Not sure yet">Not sure yet</option>
              </select>
            </div>
            <div class="form-field"><label>ENGLISH PROFICIENCY TEST <span class="text-danger">*</span></label>
              <select name="english_proficiency" required>
                <option value="">- SELECT -</option>
                <option value="IELTS">IELTS</option>
                <option value="TOEFL">TOEFL</option>
                <option value="PTE">PTE</option>
                <option value="Duolingo">Duolingo</option>
                <option value="MOI">MOI</option>
                <option value="None">None</option>
              </select>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-field full"><label>YOUR MESSAGE</label>
              <textarea name="notes" placeholder="Your Message" rows="4"></textarea>
            </div>
          </div>

          <div class="form-submit-row" style="justify-content: flex-start; margin-top: 15px;">
            <button type="submit" class="btn-primary" style="border-radius: 8px; width: 100%; text-align: center; justify-content: center; padding: 15px;">Submit Form &rarr;</button>
          </div>
        </div>
      </form>

    </div>

    <!-- trust row -->
    <div class="wrap" style="max-width:760px; margin:36px auto 0; display:flex; justify-content:space-between; flex-wrap:wrap; gap:20px;">
      <div class="stat"><b style="font-family:'Poppins',sans-serif; font-size:20px; color:var(--navy);">Free</b><span style="font-size:13px; color:var(--muted);">No cost for assessment</span></div>
      <div class="stat"><b style="font-family:'Poppins',sans-serif; font-size:20px; color:var(--navy);">24 hrs</b><span style="font-size:13px; color:var(--muted);">Response time</span></div>
      <div class="stat"><b style="font-family:'Poppins',sans-serif; font-size:20px; color:var(--navy);">96%</b><span style="font-size:13px; color:var(--muted);">Visa approval rate</span></div>
    </div>
  </div>
</section>

@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const applyForm = document.getElementById('applyForm');
        if (applyForm) {
            applyForm.addEventListener('submit', function (e) {
                e.preventDefault();
                
                let formData = new FormData(applyForm);
                let submitBtn = applyForm.querySelector('button[type="submit"]');
                let originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = 'Submitting...';
                submitBtn.disabled = true;

                fetch("{{ route('frontend.apply.submit') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    if (data.status === 'success') {
                        applyForm.reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Application Received!',
                            text: 'We will contact you shortly.'
                        });
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message || 'Something went wrong.'
                        });
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        icon: 'error',
                        title: 'An error occurred. Please try again.'
                    });
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        }
    });
</script>
@endpush
