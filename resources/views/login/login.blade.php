<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login — Villa Bali</title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  <!-- External CSS -->
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
  <!-- HEADER (tidak diubah) -->
  <header>
    <div class="navbar">
      <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Villa Bali Logo">

      </div>

      <ul class="nav-links">
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a class="login-btn" href="{{ route('login') }}">Login</a></li>
      </ul>
    </div>
  </header>

  <!-- MAIN CONTENT -->
  <main class="wrap">
    <div class="card" role="region" aria-label="form login">
      <h1>Login</h1>

      <!-- Tampilkan pesan error umum -->
      @if($errors->any())
        <div style="color:#ffb3a7; margin-bottom:12px; text-align:left;">
          <ul style="margin:0; padding-left:18px;">
            @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Form POST ke route('login') -->
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <input class="input" id="email" name="email" type="email" placeholder="Enter Your Email" value="{{ old('email') }}" required autofocus>
        <input class="input" id="password" name="password" type="password" placeholder="Password" required>

        <a class="forgot" href="{{ route('password.request', [], false) }}">Forgot password?</a>

        <button class="btn" type="submit">Login</button>
      </form>

      <div class="register">
        Don't have an account? <a href="{{ route('register') }}">Register</a>
      </div>
    </div>
  </main>

</body>
</html>
