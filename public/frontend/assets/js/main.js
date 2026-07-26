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

  // Multi-step apply form
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
      if (currentStep < steps.length - 1) { currentStep++; showStep(currentStep); window.scrollTo({top: document.querySelector('.form-shell').offsetTop - 100, behavior:'smooth'}); }
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
