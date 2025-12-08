// public/js/profile.js
(function(){
  const toggle = document.querySelector('.profile-toggle');
  const dropdown = document.getElementById('profileDropdown');

  function closeDropdown() {
    if (!dropdown) return;
    dropdown.classList.remove('show');
    if (toggle) toggle.setAttribute('aria-expanded', 'false');
    dropdown.setAttribute('aria-hidden', 'true');
  }

  function openDropdown() {
    if (!dropdown) return;
    dropdown.classList.add('show');
    if (toggle) toggle.setAttribute('aria-expanded', 'true');
    dropdown.setAttribute('aria-hidden', 'false');
  }

  window.toggleProfileMenu = function toggleProfileMenu(e) {
    // prevent page from reacting to the click
    if (e && e.stopPropagation) e.stopPropagation();

    if (!dropdown) return console.warn('profileDropdown not found');
    const isShown = dropdown.classList.contains('show');
    if (isShown) {
      closeDropdown();
      console.log('toggleProfileMenu: toggled show = false');
    } else {
      openDropdown();
      console.log('toggleProfileMenu: toggled show = true');
    }
  };

  // close when clicking outside
  document.addEventListener('click', function (ev) {
    const wrapper = document.querySelector('.profile-menu-wrapper');
    if (!wrapper) return;
    if (!wrapper.contains(ev.target)) {
      closeDropdown();
    }
  }, { capture: true });

  // optional: close on ESC
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape') closeDropdown();
  });

})();
