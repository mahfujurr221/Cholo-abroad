@extends('frontend.layouts.master')

@section('title', 'Apply Now - ' . (setting()->site_name ?? 'Cholo Abroad'))

@section('content')

<div class="page-hero">
  <div class="breadcrumb"><a href="{{ route('frontend.home') }}">Home</a> / <span class="cur">Apply now</span></div>
  <div class="eyebrow-label">Free assessment</div>
  <h1>Let's lock in your <span style="color:var(--sky)">country</span></h1>
  <p>Three short steps. A counsellor reviews your form and calls you within one business day.</p>
</div>

<section class="sec tight" style="padding-top:10px;">
  <div class="wrap">
    <div class="form-shell">

      <div class="form-steps">
        <div class="fs-dot active">1</div>
        <div class="fs-line"></div>
        <div class="fs-dot">2</div>
        <div class="fs-line"></div>
        <div class="fs-dot">3</div>
      </div>

      <form id="applyForm">
        @csrf
        <!-- STEP 1 -->
        <div class="form-step step0">
          <div class="eyebrow-label">Step 1 of 3</div>
          <h2 style="font-size:22px; color:var(--navy); margin:10px 0 24px;">Tell us about you</h2>
          <div class="form-row">
            <div class="form-field"><label>Full name</label><input type="text" name="name" placeholder="Your full name as on passport" required></div>
            <div class="form-field"><label>Date of birth</label><input type="date" name="dob" required></div>
          </div>
          <div class="form-row">
            <div class="form-field"><label>Phone number</label><input type="tel" name="phone" placeholder="+880 1XXX-XXXXXX" required></div>
            <div class="form-field"><label>Email address</label><input type="email" name="email" placeholder="you@email.com" required></div>
          </div>
          <div class="form-row">
            <div class="form-field full"><label>Current city</label><input type="text" name="city" placeholder="e.g. Bogra, Rajshahi Division" required></div>
          </div>
          <div class="form-submit-row"><button type="button" class="btn-primary next-step" style="margin-left:auto;">Continue
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
          </button></div>
        </div>

        <!-- STEP 2 -->
        <div class="form-step step1">
          <div class="eyebrow-label">Step 2 of 3</div>
          <h2 style="font-size:22px; color:var(--navy); margin:10px 0 24px;">Your goal</h2>
          <div class="form-row">
            <div class="form-field"><label>Preferred country</label>
              <select name="preferred_country" required>
                <option value="">Select a country</option>
                <option value="Canada">Canada</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Australia">Australia</option>
                <option value="Germany">Germany</option>
                <option value="United States">United States</option>
                <option value="South Korea">South Korea</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Not sure yet">Not sure yet</option>
              </select>
            </div>
            <div class="form-field"><label>Visa type</label>
              <select name="visa_type" required>
                <option value="">Select visa type</option>
                <option value="Study visa">Study visa</option>
                <option value="Work visa">Work visa</option>
                <option value="Settlement / PR">Settlement / PR</option>
                <option value="Tourist / visit">Tourist / visit</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-field"><label>Highest education</label>
              <select name="highest_education" required>
                <option value="">Select level</option>
                <option value="SSC / O-Level">SSC / O-Level</option>
                <option value="HSC / A-Level">HSC / A-Level</option>
                <option value="Bachelor's">Bachelor's</option>
                <option value="Master's">Master's</option>
              </select>
            </div>
            <div class="form-field"><label>Target intake</label>
              <select name="target_intake" required>
                <option value="">Select intake</option>
                <option value="Feb 2027">Feb 2027</option>
                <option value="Sep 2027">Sep 2027</option>
                <option value="Jan 2028">Jan 2028</option>
                <option value="Flexible">Flexible</option>
              </select>
            </div>
          </div>
          <div class="form-submit-row">
            <button type="button" class="btn-ghost prev-step">Back</button>
            <button type="button" class="btn-primary next-step">Continue
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
            </button>
          </div>
        </div>

        <!-- STEP 3 -->
        <div class="form-step step2">
          <div class="eyebrow-label">Step 3 of 3</div>
          <h2 style="font-size:22px; color:var(--navy); margin:10px 0 24px;">Anything else we should know?</h2>
          <div class="form-row">
            <div class="form-field full"><label>Notes for your counsellor (optional)</label>
              <textarea name="notes" placeholder="IELTS/TOEFL score, budget range, prior visa refusals — anything that helps us prep."></textarea>
            </div>
          </div>
          <div class="checkbox-row">
            <input type="checkbox" required>
            <span>I agree to be contacted by Cholo Abroad by phone, SMS, or email regarding my application, and I accept the Privacy Policy.</span>
          </div>
          <div class="form-submit-row">
            <button type="button" class="btn-ghost prev-step">Back</button>
            <button type="submit" class="btn-primary">Submit application
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
            </button>
          </div>
        </div>
      </form>

      <div class="form-success">
        <div class="tick"><svg viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></div>
        <h3>Application received</h3>
        <p>A counsellor will review your form and call you within one business day. Keep an eye on your phone and inbox.</p>
      </div>

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

@push('scripts')
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
                    if (data.status === 'success') {
                        applyForm.style.display = 'none';
                        document.querySelector('.form-success').style.display = 'block';
                    } else {
                        alert(data.message || 'Something went wrong. Please try again.');
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again later.');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        }
    });
</script>
@endpush
