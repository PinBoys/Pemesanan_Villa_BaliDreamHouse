<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title', config('app.name', 'Villa Bali'))</title>

  {{-- Vite (Tailwind) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Bootstrap CSS (CDN) as fallback for .card/.container etc. --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
  /* make sure header logo always small */
  img[src*="logo"] { max-width:56px; width:56px; height:56px; object-fit:contain; }

  /* ensure any default huge images cannot overflow */
  img { max-width:100%; height:auto; display:block; }

  /* make profile card above any stray images */
  .card, .profile-card-fallback { position: relative; z-index: 20; }

  /* if there is a decorative big-logo inserted accidentally, hide it */
  img.big-logo, .hero-logo, .logo-large { display: none !important; }

  /* ensure body/content has space under fixed header */
  body { padding-top: 72px; }
</style>


  @stack('head')
</head>
<body class="antialiased bg-white">
  <div id="app">
    @include('layouts.header')
    <main>
      @yield('content')
    </main>
  </div>

  {{-- Bootstrap JS (for any bootstrap components) --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
