<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bali Dream House')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">🏝 Bali Dream House</a>
            <div>
                <a class="nav-link d-inline text-white" href="{{ route('villas.index') }}">Villa</a>
                <a class="nav-link d-inline text-white" href="{{ route('pemesanans.index') }}">Pemesanan</a>
                <a class="nav-link d-inline text-white" href="{{ route('pembayarans.index') }}">Pembayaran</a>
            </div>
        </div>
    </nav>

    {{-- Isi Konten Dinamis --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>