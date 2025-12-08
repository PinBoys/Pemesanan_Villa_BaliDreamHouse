<header class="site-header bg-[linear-gradient(90deg,#6b5250,#7c6058)]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      {{-- LEFT LOGO --}}
      <div class="flex items-center gap-3">
        <a href="{{ route('landing') }}" class="flex items-center gap-3">
          <img src="{{ asset('images/logo.png') }}" alt="Villa Bali" class="h-10 w-10 object-contain">
          <div class="hidden sm:block">
            <div class="text-sm font-semibold text-white leading-tight">Villa Bali</div>
            <div class="text-xs text-white/70 -mt-0.5">Dream House</div>
          </div>
        </a>
      </div>

      {{-- NAV LINKS (DESKTOP) --}}
      <nav class="hidden md:flex items-center space-x-8">
        <a href="{{ route('landing') }}" class="text-white/90 hover:text-white transition">Home</a>
        <a href="{{ route('villas.index') }}" class="text-white/90 hover:text-white transition">Villa</a>
        <a href="{{ route('villas.index') }}#availability" class="text-white/90 hover:text-white transition">
          Check Availability
        </a>
      </nav>

      {{-- RIGHT SIDE --}}
      <div class="flex items-center gap-4">

        {{-- BELL ICON --}}
        <button class="p-2 rounded-md hover:bg-white/10 transition" aria-label="Notifications">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white/90" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118.6 14.6V11a6 6 0 10-12 0v3.6c0 .538-.214 1.055-.595 1.495L4 17h5m6 0v1a3 3 0 11-6 0v-1" />
          </svg>
        </button>

        {{-- AVATAR ONLY (NO DROPDOWN) --}}
        @auth
        <a href="{{ route('profile') }}" class="block">
          <img src="{{ auth()->user()->profile_photo ? asset('profile_photos/' . auth()->user()->profile_photo) : asset('images/default_avatar.jpg') }}"
               alt="avatar"
               class="h-9 w-9 rounded-full object-cover border border-white/30 shadow-md hover:ring-2 hover:ring-white/60 transition"
               onerror="this.onerror=null;this.src='{{ asset('images/default_avatar.jpg') }}'">
        </a>
        @endauth

        {{-- GUEST --}}
        @guest
        <div class="hidden md:flex items-center gap-3">
          <a href="{{ route('login') }}" class="text-white/90 hover:text-white text-sm">Login</a>
          <a href="{{ route('register') }}" class="text-white/90 hover:text-white text-sm">Register</a>
        </div>
        @endguest

        {{-- MOBILE MENU BUTTON --}}
        <button id="mobileMenuBtn" class="md:hidden p-2 rounded-md hover:bg-white/10 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white/90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
              d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>

      </div>
    </div>
  </div>

  {{-- MOBILE NAV --}}
  <div id="mobileMenu" class="md:hidden hidden bg-[rgba(0,0,0,0.6)]">
    <div class="px-4 pb-4 pt-2 space-y-1">
      <a href="{{ route('landing') }}" class="block px-3 py-2 text-white hover:bg-white/10 rounded">Home</a>
      <a href="{{ route('villas.index') }}" class="block px-3 py-2 text-white hover:bg-white/10 rounded">Villa</a>
      <a href="{{ route('villas.index') }}#availability" class="block px-3 py-2 text-white hover:bg-white/10 rounded">Check Availability</a>

      @guest
      <a href="{{ route('login') }}" class="block px-3 py-2 text-white hover:bg-white/10 rounded">Login</a>
      <a href="{{ route('register') }}" class="block px-3 py-2 text-white hover:bg-white/10 rounded">Register</a>
      @endguest

      @auth
      <a href="{{ route('profile') }}" class="block px-3 py-2 text-white hover:bg-white/10 rounded">Profile</a>
      <a href="{{ route('pembayarans.index') }}" class="block px-3 py-2 text-white hover:bg-white/10 rounded">Payment History</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left px-3 py-2 text-white hover:bg-white/10 rounded">Logout</button>
      </form>
      @endauth
    </div>
  </div>

  {{-- TOGGLE SCRIPT --}}
  @push('scripts')
  <script>
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    btn?.addEventListener('click', () => menu.classList.toggle('hidden'));
  </script>
  @endpush
</header>
