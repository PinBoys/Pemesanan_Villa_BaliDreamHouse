<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Logout Confirm - Bali Dream House</title>

  <!-- load landing base if you want visual consistency (optional) -->
  @if (file_exists(public_path('css/landing.css')))
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
  @endif

  <!-- our dedicated logout css -->
  <link rel="stylesheet" href="{{ asset('css/logout.css') }}">

  <!-- small JS to hide heavy/overlapping elements from other CSS if present -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // add class to body (scoping)
      document.body.classList.add('logout-page');

      // hide common large decorative elements that may come from landing.css
      const hideSelectors = [
        '.hero-content', '.hero h1', '.hero h2', '.site-title', '.big-logo',
        '.decorative-logo', '.hero-logo', '.watermark-logo', '.big-brand', '.headline'
      ];
      hideSelectors.forEach(sel => {
        document.querySelectorAll(sel).forEach(el => {
          el.style.display = 'none';
          el.style.visibility = 'hidden';
        });
      });

      // make any nav lists inline
      document.querySelectorAll('nav ul, .nav-links, .navbar ul').forEach(ul => {
        ul.style.listStyle = 'none';
        ul.style.display = 'flex';
        ul.style.gap = '18px';
        ul.style.alignItems = 'center';
        ul.style.margin = '0';
        ul.style.padding = '0';
      });

      // reduce avatar images (defensive)
      document.querySelectorAll('.profile-link img, .profile-icon img, .avatar img').forEach(img => {
        img.style.width = '30px';
        img.style.height = '30px';
        img.style.objectFit = 'cover';
      });
    });
  </script>
</head>
<body class="logout-page">

  <!-- NAVBAR (minimal & consistent with your landing) -->
  <header class="logout-navbar" role="banner" aria-label="Main header">
    <div class="lnav-left">
      <a href="{{ route('landing') }}" class="lnav-brand">
        <img src="{{ asset('images/logo.png') }}" alt="Villa Bali" class="lnav-logo">
      </a>
    </div>

    <nav class="lnav-nav" role="navigation" aria-label="Main">
      <ul class="lnav-list">
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="{{ url('/villa') }}">Villa</a></li>
        <li><a href="{{ url('/availability') }}">Check Availability</a></li>
      </ul>
    </nav>

    <div class="lnav-right">
      <button class="lnav-icon" aria-hidden="true">🔔</button>
      <a href="{{ route('profile') }}" class="profile-link">
        <img src="{{ auth()->user()->profile_photo ? asset('profile_photos/' . auth()->user()->profile_photo) : asset('images/default_avatar.jpg') }}" alt="avatar">
      </a>
    </div>
  </header>

  <!-- Full-bleed background image (fills viewport, behind everything) -->
  <div class="logout-hero" aria-hidden="true">
    <img class="logout-hero-img" src="{{ asset('images/header1.jpg') }}" alt="background">
    <div class="logout-hero-dark"></div>
  </div>

  <!-- Small top-center page label (like "Logout Confirm") -->
  <div class="logout-toplabel" aria-hidden="true">Logout Confirm</div>

  <!-- Modal overlay + card -->
  <div class="logout-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="logoutTitle">
    <div class="logout-modal-card" role="document">
      <div class="logout-modal-icon" aria-hidden="true">⚠️</div>
      <h3 id="logoutTitle" class="logout-modal-title">Logout Confirmation</h3>
      <p class="logout-modal-sub">Are you sure want to log out?</p>

      <div class="logout-modal-actions">
        <a href="{{ route('landing') }}" class="btn-cancel" style="text-decoration:none;">Cancel</a>

        <form action="{{ route('logout.perform') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn-logout">Logout</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
