document.addEventListener('DOMContentLoaded', function () {
  let btn = document.querySelector('.hamburger');
  let body = document.body;

  if (!btn) return;

  btn.addEventListener('click', function () {
    body.classList.toggle('nav-open');

    var icon = btn.querySelector('i');
    if (body.classList.contains('nav-open')) {
      icon.classList.remove('fa-bars');
      icon.classList.add('fa-xmark');
    } else {
      icon.classList.remove('fa-xmark');
      icon.classList.add('fa-bars');
    }
  });

  document.querySelectorAll('.nav-links a').forEach(function (a) {
    a.addEventListener('click', function () {
      body.classList.remove('nav-open');
      let icon = btn.querySelector('i');
      if (icon) {
        icon.classList.remove('fa-xmark');
        icon.classList.add('fa-bars');
      }
    });
  });

  document.addEventListener('click', function (e) {
    if (body.classList.contains('nav-open') && !e.target.closest('nav.nav-links') && !e.target.closest('.hamburger')) {
      body.classList.remove('nav-open');
      let icon = btn.querySelector('i');
      if (icon) {
        icon.classList.remove('fa-xmark');
        icon.classList.add('fa-bars');
      }
    }
  });
});
