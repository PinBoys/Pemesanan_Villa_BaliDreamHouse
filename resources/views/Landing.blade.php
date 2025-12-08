<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Dream House Villa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <style>
        /* kecil saja supaya profile icon rapi */
        .nav-links { list-style:none; display:flex; gap:18px; align-items:center; margin:0; padding:0; }
        .nav-links li { display:inline-flex; align-items:center; }
        .login-btn { background:#f5b041; color:#fff; padding:8px 12px; border-radius:8px; text-decoration:none; }
        .profile-icon img { width:36px; height:36px; border-radius:50%; object-fit:cover; border:2px solid rgba(255,255,255,0.85); }
    </style>
</head>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.auth-header');
    if (!header) return;

    function checkScroll() {
        if (window.scrollY > 80) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    checkScroll();
    window.addEventListener('scroll', checkScroll);
});
</script>

<body>

<!-- HEADER -->
<header class="site-header {{ auth()->check() ? 'auth-header' : 'guest-header' }}">
    <nav class="navbar">
        
        {{-- LOGO KEMBALI SEPERTI SEMULA --}}
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>

        <ul class="text-white flex gap-5">

            {{-- Jika BELUM login --}}
            @guest
                <li><a  href="{{ route('landing') }}">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>

                <li><a href="{{ route('login') }}" class="login-btn">Login</a></li>
            @endguest

            {{-- Jika SUDAH login --}}
            @auth
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li><a href="#villa">Villa</a></li>
                <li><a href="#availability">Check Availability</a></li>

              <li class="relative">
    <!-- BUTTON AVATAR -->
    <button 
        type="button" 
        onclick="toggleProfileMenu()" 
        aria-expanded="false"
        class="flex items-center"
    >
        <img 
            src="{{ auth()->user()->profile_photo
                    ? asset('profile_photos/' . auth()->user()->profile_photo)
                    : asset('images/default_avatar.jpg') }}"
            class="w-10 h-10 rounded-full object-cover border-2 border-white"
            alt="profile"
        >
    </button>

    <!-- DROPDOWN -->
    <div 
        id="profileDropdown" 
        class="hidden pt-5 absolute right-0 mt-[30px] w-96 bg-white text-black rounded-xl shadow-xl p-4 z-50"
    >
        <!-- Header -->
        <div class="flex items-center gap-3 pb-3 border-b">
            <img 
                src="{{ auth()->user()->profile_photo
                        ? asset('profile_photos/' . auth()->user()->profile_photo)
                        : asset('images/default_avatar.jpg') }}"
                class="w-12 h-12 rounded-full object-cover"
            >
            <div>
                <p class="font-semibold">Hi, {{ auth()->user()->name }}</p>
                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <!-- Menu Items -->
<a href="{{ route('profile') }}" 
    class="block mt-3 py-2 text-sm text-black transition">
    View Profile
</a>

<a href="{{ route('pembayarans.index') }}" 
    class="block py-2 text-sm text-black transition">
    Payment History
</a>


        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button 
                type="submit" 
                class="block w-full text-left py-2 text-sm hover:text-red-600 transition"
            >
                Logout
            </button>
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
<footer class="site-footer">
  <div class="footer-inner container">
    <div class="footer-col contact">
      <h3>Contact</h3>
      <p><strong>Phone:</strong> +62 819 9390 0319</p>
      <p><strong>Email:</strong> bali@dreamhousevilla.net</p>
    </div>

    <div class="footer-col about">
      <h3>About</h3>
      <p>Bali Dream House Villa brings a blend of nature and comfort. Enjoy breathtaking sunsets, lush gardens, and traditional Balinese hospitality.</p>
    </div>

    <div class="footer-col extra">
      <!-- kosongkan heading agar kolom sejajar -->
      <h3 style="visibility:hidden;">x</h3>
      <p style="margin-top:0.4rem;">&nbsp;</p>
      <p class="copyright">©2025 Bali Dream House Villa</p>
      <p class="designer">Design by SKS Digidaw</p>
    </div>
  </div>
  <!-- single bottom rule & copyright (single source of truth) -->
  <div class="footer-bottom">
    <div class="container">
      <hr class="footer-rule">
      <p class="copyright-small">©2025 Bali Dream House Villa</p>
    </div>
  </div>
</footer>


    <script src="{{ asset('js/profile.js') }}"></script>

    
<script>
function toggleProfileMenu() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('hidden');
}

// klik di luar → tutup
document.addEventListener('click', function (e) {
    const dropdown = document.getElementById('profileDropdown');
    const btn = document.querySelector('.profile-toggle');

    if (!dropdown || !btn) return;

    if (!dropdown.contains(e.target) && !btn.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
});
</script>

</body>
</html>
