<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Dream House Villa</title>

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <style>
        /* kecil saja supaya profile icon rapi di navbar (override cepat) */
        .nav-links { list-style:none; display:flex; gap:18px; align-items:center; margin:0; padding:0; }
        .nav-links li { display:inline-flex; align-items:center; }
        .login-btn { background:#f5b041; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; }
        .profile-icon img { width:36px; height:36px; border-radius:50%; object-fit:cover; border:2px solid rgba(255,255,255,0.85); }
    </style>
</head>
<body>
    <!-- Navbar -->
<header>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>

            @guest
                <li><a href="{{ route('login') }}" class="login-btn">Login</a></li>
            @endguest

            @auth
<li class="profile-menu-wrapper" style="position:relative;">
  <button type="button" class="profile-toggle" onclick="toggleProfileMenu()" aria-expanded="false" aria-controls="profileDropdown" style="background:none;border:0;padding:0;cursor:pointer;">
    <img 
      src="{{ auth()->user()->profile_photo
              ? asset('profile_photos/' . auth()->user()->profile_photo)
              : asset('images/default_avatar.jpg') }}"
      alt="profile" style="width:36px;height:36px;border-radius:50%;object-fit:cover;border:2px solid rgba(255,255,255,0.85);">
  </button>

  <div id="profileDropdown" class="profile-dropdown show" role="menu" aria-hidden="false">
    <div class="profile-header">
      <img src="{{ auth()->user()->profile_photo
              ? asset('profile_photos/' . auth()->user()->profile_photo)
              : asset('images/default_avatar.jpg') }}"
           alt="avatar" class="mini-avatar">
      <div class="profile-meta">
        <div class="profile-name">Hi, {{ auth()->user()->name }}</div>
        <div class="profile-email">{{ auth()->user()->email }}</div>
      </div>
    </div>

    <a href="{{ route('profile') }}" class="dropdown-item">View Profile</a>
    <a href="{{ route('pembayarans.index') }}" class="dropdown-item">Payment History</a>

    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="dropdown-item logout-btn">Logout</button>
    </form>
  </div>
</li>
@endauth

        </ul>
    </nav>
</header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Bali</h1>
            <h2>Dream House Villa</h2>
            <p>Luxury experience for your perfect holiday in Bali. 
               Relax, enjoy, and indulge in the serenity of tropical paradise.</p>
            <a href="#" class="btn">BOOK NOW</a>
        </div>
    </section>

    <!-- Property Highlights -->
    <section class="highlights">
        <h2>Property Highlights</h2>
        <div class="highlight-container">
            <div class="card">
                <img src="{{ asset('images/bali1.jpg') }}" alt="Bali dream house 1">
                <h3>Subheading</h3>
                <p>Enjoy your private pool & lush surroundings.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/bali2.jpg') }}" alt="Bali dream house 2">
                <h3>Subheading</h3>
                <p>Spacious living area to unwind in peace.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/bali3.jpg') }}" alt="Bali dream house 3">
                <h3>Subheading</h3>
                <p>Relax in style beside your private pool.</p>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section class="location">
        <h2>Location</h2>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.823013202307!2d115.1450874!3d-8.6359275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd22f42306b2cf9%3A0x8b9fdfdfb40c4f3f!2sBali!5e0!3m2!1sen!2sid!4v1698239970151!5m2!1sen!2sid" 
                width="100%" height="350" style="border:0;" allowfullscreen loading="lazy"></iframe>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="contact">
                <h3>Contact</h3>
                <p>Phone: +62 819 9390 0319</p>
                <p>Email: bali@dreamhousevilla.net</p>
            </div>
            <div class="about">
                <h3>About</h3>
                <p>Bali Dream House Villa brings a blend of nature and comfort. 
                Enjoy breathtaking sunsets, lush gardens, and traditional Balinese hospitality.</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>©2025 Bali Dream House Villa</p>
        </div>
    </footer>

    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
