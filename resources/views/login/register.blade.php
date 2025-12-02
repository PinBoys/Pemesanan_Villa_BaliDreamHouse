<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register — Villa Bali</title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  <!-- CSS: load login.css first (navbar + common), lalu register.css -->
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
  <!-- HEADER (sama seperti login) -->
  <header>
    <div class="navbar">
      <div class="logo">
        <!-- Pakai nama file yang benar (periksa di public/images/) -->
        <img src="{{ asset('images/Logo.png') }}" alt="Villa Bali Logo">
      </div>

      <ul class="nav-links">
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a class="login-btn" href="{{ route('login') }}">Login</a></li>
      </ul>
    </div>
  </header>

  <!-- MAIN CONTENT: gunakan class register-wrap yang sesuai register.css -->
  <main class="register-wrap">
    <div class="register-card" role="region" aria-label="form register">
      <h1>Register</h1>

      <!-- Tampilkan pesan sukses -->
      @if(session('status'))
        <div style="color:#bfecc6; margin-bottom:12px; text-align:left;">
          {{ session('status') }}
        </div>
      @endif

      <!-- Tampilkan error validasi -->
      @if($errors->any())
        <div style="color:#ffb3a7; margin-bottom:12px; text-align:left;">
          <ul style="margin:0; padding-left:18px;">
            @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Form Register -->
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <input class="input" type="text" name="nama_pelanggan" placeholder="Username" value="{{ old('nama_pelanggan') }}" required>
        <input class="input" type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
        <input class="input" type="password" name="password" placeholder="Password" required>
        <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <input class="input" type="text" name="no_hp" placeholder="Phone number (optional)" value="{{ old('no_hp') }}">
        <textarea class="input" name="alamat" placeholder="Address (optional)" rows="3">{{ old('alamat') }}</textarea>

        <button class="btn" type="submit">Register</button>
      </form>

      <div class="login-text">
        Already have an account? <a href="{{ route('login') }}">Login</a>
      </div>
    </div>
  </main>
</body>
</html>
