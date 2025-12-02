<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bali Dream House')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* === NAVBAR === */
header {
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 1000;
  background: rgba(26, 26, 26, 0.6);
  backdrop-filter: blur(10px);
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  transition: background 0.4s ease, box-shadow 0.4s ease;
}

header:hover {
  background: rgba(26, 26, 26, 0.85);
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.5rem 5%;
  animation: slideDown 1s ease forwards;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 30px;
}

.nav-links a {
  color: #fff;
  text-decoration: none;
  position: relative;
  font-weight: 500;
  letter-spacing: 0.5px;
  transition: color 0.3s ease;
}

.nav-links a::after {
  content: "";
  position: absolute;
  bottom: -6px;
  left: 0;
  width: 0;
  height: 2px;
  background: #ffb347;
  transition: width 0.4s ease;
}

.nav-links a:hover::after {
  width: 100%;
}

.nav-links a:hover {
  color: #ffb347;
}

.login-btn {
  background: linear-gradient(135deg, #ffb347, #ffcc33);
  padding: 8px 16px;
  border-radius: 6px;
  color: #1a1a1a;
  font-weight: bold;
  transition: all 0.3s ease;
}

.profile-icon img { 
  border:2px solid rgba(255,255,255,0.8);
}

.alert { 
  padding:8px 12px; border-radius:6px; 
}

.login-btn:hover {
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 6px 15px rgba(255, 179, 71, 0.5);
}

.logo img {
  width: 70px;
  height: auto;
  vertical-align: middle;
  margin-top: -3px;
  transform: scale(1.5);
}
</style>

</head>
<body style="background-color: #f8f9fa;">

<header>
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="logo">
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('villas.index') }}">Villa</a></li>
            <li><a href="{{ route('pemesanans.index') }}">Pemesanan</a></li>
            <li><a href="{{ route('pembayarans.index') }}">Pembayaran</a></li>
        </ul>
    </nav>
</header>



    {{-- Isi Konten Dinamis --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>