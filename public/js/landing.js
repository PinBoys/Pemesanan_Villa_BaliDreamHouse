document.addEventListener('DOMContentLoaded', function () {
  // 1) Efek scroll untuk auth-header
  const authHeader = document.querySelector('.auth-header');
  const SCROLL_THRESHOLD = 80;

  function handleScroll() {
    if (!authHeader) return;
    if (window.scrollY > SCROLL_THRESHOLD) {
      authHeader.classList.add('scrolled');
      document.body.classList.add('has-fixed-header'); // beri padding-top ke hero
    } else {
      authHeader.classList.remove('scrolled');
      document.body.classList.remove('has-fixed-header');
    }
  }
  handleScroll();
  window.addEventListener('scroll', handleScroll);

  // 2) Toggle dropdown profil
  const profileToggle = document.querySelector('.profile-toggle');
  const profileDropdown = document.getElementById('profileDropdown');

  window.toggleProfileMenu = function () {
    if (!profileDropdown) return;
    const isShown = profileDropdown.classList.toggle('show');
    // accessibility
    if (profileToggle) profileToggle.setAttribute('aria-expanded', isShown ? 'true' : 'false');
    profileDropdown.setAttribute('aria-hidden', isShown ? 'false' : 'true');
  };

  // close dropdown kalau klik diluar
  document.addEventListener('click', function (e) {
    if (!profileDropdown || !profileToggle) return;
    const isClickInside = profileDropdown.contains(e.target) || profileToggle.contains(e.target);
    if (!isClickInside && profileDropdown.classList.contains('show')) {
      profileDropdown.classList.remove('show');
      profileToggle.setAttribute('aria-expanded', 'false');
      profileDropdown.setAttribute('aria-hidden', 'true');
    }
  });

  // close on escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && profileDropdown && profileDropdown.classList.contains('show')) {
      profileDropdown.classList.remove('show');
      if (profileToggle) profileToggle.setAttribute('aria-expanded', 'false');
      profileDropdown.setAttribute('aria-hidden', 'true');
    }
  });
});
