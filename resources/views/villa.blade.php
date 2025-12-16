<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bali Dream House – Villa 3</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        h1,h2,h3 {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-white text-gray-800">

<!-- ================= NAVBAR ================= -->
<header class="fixed top-0 left-0 w-full bg-black/50 backdrop-blur-md z-50">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" class="w-12 h-12 object-contain">
            <div class="text-white">
                <div class="font-semibold">Bali Dream House</div>
                <div class="text-xs opacity-80">Luxury Villa</div>
            </div>
        </div>

        <!-- MENU -->
        <ul class="hidden md:flex items-center gap-8 text-white font-medium">
            <li><a href="{{ route('landing') }}" class="hover:underline">Home</a></li>
            <li><a href="#about" class="hover:underline">About</a></li>
            <li><a href="#availability" class="hover:underline">Availability</a></li>
            <li><a href="#contact" class="hover:underline">Contact</a></li>

            @guest
                <li>
                    <a href="{{ route('login') }}"
                       class="bg-amber-400 text-black px-5 py-2 rounded-xl font-semibold hover:bg-amber-300 transition">
                        Login
                    </a>
                </li>
            @endguest

            @auth
                <li class="relative group">
                    <img
                        src="{{ auth()->user()->profile_photo
                            ? asset('profile_photos/' . auth()->user()->profile_photo)
                            : asset('images/default_avatar.jpg') }}"
                        class="w-9 h-9 rounded-full object-cover cursor-pointer border-2 border-white">

                    <div class="absolute right-0 mt-3 w-56 bg-white text-gray-700 rounded-xl shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto">
                        <div class="p-4 border-b">
                            <div class="font-semibold">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ auth()->user()->email }}</div>
                        </div>
                        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">View Profile</a>
                        <a href="{{ route('pembayarans.index') }}" class="block px-4 py-2 hover:bg-gray-100">Payment History</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </li>
            @endauth
        </ul>
    </nav>
</header>

<!-- ================= HERO ================= -->
<section class="h-screen bg-cover bg-center relative flex items-center justify-center"
         style="background-image:url('{{ asset('images/awal.jpg') }}')">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative text-center text-white px-6">
        <h1 class="text-5xl md:text-6xl font-semibold">Bali Dream House</h1>
        <p class="mt-4 text-lg opacity-90">Villa 3 — Nature · Romance · Luxury</p>
    </div>
</section>

<!-- ================= EXPERIENCE ================= -->
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 text-center">
        <div class="bg-white p-8 rounded-2xl shadow">Living Area</div>
        <div class="bg-white p-8 rounded-2xl shadow">Outdoors</div>
        <div class="bg-white p-8 rounded-2xl shadow">Quick Fact</div>
    </div>
</section>

<!-- ================= IMAGE STRIP ================= -->
<section class="max-w-6xl mx-auto grid md:grid-cols-3 gap-6 px-6">
    <img src="{{ asset('images/livingarea.jpg') }}" class="rounded-2xl shadow">
    <img src="{{ asset('images/outdor.jpg') }}" class="rounded-2xl shadow">
    <img src="{{ asset('images/quickfast.jpg') }}" class="rounded-2xl shadow">
</section>

<!-- ================= INTRO ================= -->
<section class="max-w-3xl mx-auto text-center py-20 px-6">
    <h2 class="text-3xl font-semibold">Nature, Romance, and Private Luxury</h2>
    <p class="mt-4 text-gray-600">
        Bali Dream House Villa 3 is an exclusive sanctuary designed for couples
        seeking tranquility, privacy, and timeless elegance.
    </p>
</section>

<!-- ================= DETAIL ================= -->
<section class="bg-gray-50 py-20">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-3xl font-semibold text-center">Experience Comfort and Elegance</h2>
        <p class="mt-6 text-gray-600 text-center">
            Natural textures, warm wooden elements, and tropical charm blend
            effortlessly for a luxurious stay.
        </p>

        <div class="grid md:grid-cols-3 gap-6 mt-12">
            <img src="{{ asset('images/livingarea.jpg') }}" class="rounded-xl shadow">
            <img src="{{ asset('images/awal.jpg') }}" class="rounded-xl shadow">
            <img src="{{ asset('images/outdor.jpg') }}" class="rounded-xl shadow">
        </div>
    </div>
</section>

<!-- ================= FACTS ================= -->
<section class="max-w-6xl mx-auto py-20 px-6 grid md:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-semibold">Location</h4>
        <p class="text-sm text-gray-600 mt-2">Karangasem, Bali</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-semibold">Capacity</h4>
        <p class="text-sm text-gray-600 mt-2">2 Adults</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-semibold">Facilities</h4>
        <p class="text-sm text-gray-600 mt-2">Private Pool, Garden</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-semibold">Service</h4>
        <p class="text-sm text-gray-600 mt-2">Daily Breakfast</p>
    </div>
</section>

<!-- ================= CTA / AVAILABILITY ================= -->
<section id="availability" class="bg-slate-900 text-white py-20 text-center px-6">
    <h2 class="text-4xl font-semibold">Your Private Escape Awaits</h2>
    <p class="mt-4 text-gray-300 max-w-xl mx-auto">
        Experience the calm, romance, and beauty of Bali in a villa designed
        for unforgettable moments.
    </p>
    <a href="{{ route('availability') }}"
       class="inline-block mt-8 bg-amber-400 text-black px-8 py-3 rounded-xl font-semibold hover:bg-amber-300 transition">
        Check Availability
    </a>
</section>

</body>
</html>
