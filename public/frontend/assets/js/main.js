// ─── Preloader ───────────────────────────────────────────────────
window.addEventListener('load', function() {
  var preloader = document.getElementById('preloader');
  if (preloader) {
    preloader.classList.add('fade-out');
    setTimeout(function() {
      preloader.style.display = 'none';
    }, 500);
  }
});

document.addEventListener('DOMContentLoaded', function () {

  // Country dropdown toggle
  document.querySelectorAll('.dd-trigger').forEach(function (trigger) {
    trigger.addEventListener('click', function (e) {
      e.stopPropagation();
      var dd = trigger.closest('.dd');
      var wasOpen = dd.classList.contains('open');
      document.querySelectorAll('.dd.open').forEach(function (d) { d.classList.remove('open'); });
      if (!wasOpen) dd.classList.add('open');
    });
  });
  document.addEventListener('click', function () {
    document.querySelectorAll('.dd.open').forEach(function (d) { d.classList.remove('open'); });
  });

  // Mobile menu toggle
  var mt = document.querySelector('.mobile-toggle');
  var links = document.querySelector('.nav-links');
  if (mt && links) {
    mt.addEventListener('click', function (e) {
      e.stopPropagation();
      links.classList.toggle('mobile-open');
    });
    document.addEventListener('click', function (e) {
      if (!links.contains(e.target) && !mt.contains(e.target)) {
        links.classList.remove('mobile-open');
      }
    });
  }

  // FAQ accordion
  document.querySelectorAll('.faq-q').forEach(function (q) {
    q.addEventListener('click', function () {
      var item = q.closest('.faq-item');
      var wasOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(function (f) { f.classList.remove('open'); });
      if (!wasOpen) item.classList.add('open');
    });
  });

  // Filter pills (countries page)
  document.querySelectorAll('.filter-pill').forEach(function (pill) {
    pill.addEventListener('click', function () {
      document.querySelectorAll('.filter-pill').forEach(function (p) { p.classList.remove('active'); });
      pill.classList.add('active');
      var group = pill.dataset.filter;
      document.querySelectorAll('.country-card').forEach(function (card) {
        if (group === 'all' || card.dataset.region === group) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // ─── Apply button shake ──────────────────────────────────────────
  var applyBtns = document.querySelectorAll('.apply-btn');
  function triggerShake() {
    applyBtns.forEach(function (btn) {
      btn.classList.remove('shaking');
      void btn.offsetWidth; // reflow to restart animation
      btn.classList.add('shaking');
      btn.addEventListener('animationend', function () {
        btn.classList.remove('shaking');
      }, { once: true });
    });
  }
  if (applyBtns.length > 0) {
    setTimeout(triggerShake, 5000);             // first shake at 5 s
    setInterval(triggerShake, 15000);           // every 15 s after
  }

  // ─── Step validation helper ──────────────────────────────────────
  function validateStep(stepEl) {
    var valid = true;
    // Clear old errors
    stepEl.querySelectorAll('.field-error').forEach(function (el) { el.classList.remove('field-error'); });
    stepEl.querySelectorAll('.field-error-msg').forEach(function (el) { el.remove(); });

    stepEl.querySelectorAll('input[required], select[required], textarea[required]').forEach(function (field) {
      var empty = false;
      if (field.type === 'checkbox') {
        empty = !field.checked;
      } else {
        empty = field.value.trim() === '';
      }

      if (empty) {
        valid = false;
        field.classList.add('field-error');
        var msg = document.createElement('span');
        msg.className = 'field-error-msg';
        msg.textContent = 'This field is required.';
        if (field.type === 'checkbox') {
          field.parentNode.appendChild(msg);
        } else {
          field.parentNode.appendChild(msg);
        }
        // Remove error on input
        field.addEventListener('input', function () {
          field.classList.remove('field-error');
          if (msg.parentNode) msg.parentNode.removeChild(msg);
        }, { once: true });
        field.addEventListener('change', function () {
          field.classList.remove('field-error');
          if (msg.parentNode) msg.parentNode.removeChild(msg);
        }, { once: true });
      }
    });

    return valid;
  }

  // ─── Multi-step apply form ───────────────────────────────────────
  var steps = document.querySelectorAll('.form-step');
  var dots = document.querySelectorAll('.fs-dot');
  var currentStep = 0;

  function showStep(i) {
    steps.forEach(function (s, idx) { s.style.display = idx === i ? 'block' : 'none'; });
    dots.forEach(function (d, idx) { d.classList.toggle('active', idx <= i); });
  }

  document.querySelectorAll('.next-step').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var currentStepEl = steps[currentStep];
      if (!validateStep(currentStepEl)) return;   // stop if invalid
      if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
        var shell = document.querySelector('.form-shell');
        if (shell) window.scrollTo({ top: shell.offsetTop - 100, behavior: 'smooth' });
      }
    });
  });

  document.querySelectorAll('.prev-step').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      if (currentStep > 0) { currentStep--; showStep(currentStep); }
    });
  });

  if (steps.length) showStep(0);
});

