@extends('layouts.app')

@section('title','Profile')

@section('content')
<style>
body {
    margin: 0;
    padding: 0;
    background-image: url('{{ asset("images/header1.jpg") }}');
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
}

.profile-hero {
    background-image: url('{{ asset("images/header1.jpg") }}');
    background-size: cover;
    background-position: center;
    padding: 80px 0;
}

.profile-card {
    max-width: 760px;
    margin: -40px auto 40px;
    background: rgba(255,255,255,0.18);
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.25);
    backdrop-filter: blur(8px);
    color: #111;
}

.profile-top {
    display:flex;
    gap:20px;
    align-items:center;
}

.profile-img {
    width:110px; height:110px;
    border-radius:50%;
    object-fit:cover;
    border: 4px solid rgba(255,255,255,0.6);
    background:#fff;
}


.profile-page {
    position: relative;
    width: 100%;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding-top: 100px;
}


/* Agar card tidak ketiban overlay */
.profile-page > * {
    position: relative;
    z-index: 2;
}

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

.alert { 
  padding:8px 12px; border-radius:6px; 
}


.logo img {
  width: 70px;
  height: auto;
  vertical-align: middle;
  margin-top: -3px;
  transform: scale(1.5);
}

</style>

<!-- ❗ Bungkus dengan .profile-page -->
<div class="profile-page">

    <div class="profile-card">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="profile-top">
            <div>
                <img src="{{ $user->profile_photo ? asset('profile_photos/'.$user->profile_photo) : asset('images/default-avatar.png') }}" alt="avatar" class="profile-img">
            </div>

            <div style="flex:1;">
                <h3>Hi {{ $user->name }}</h3>
                <div style="margin-top:8px;">
                    <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data" style="display:inline-block;">
                        @csrf
                        <label class="btn-change" for="photoUpload">Change Photo</label>
                        <input id="photoUpload" type="file" name="profile_photo" accept="image/*" style="display:none" onchange="this.form.submit()">
                    </form>

                    <form action="{{ route('logout') }}" method="POST" style="display:inline-block; margin-left:8px;">
                        @csrf
                        <button class="btn-logout" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="info-row">
            <label>Personal Information</label>
            <div class="info-box">
                <p><strong>Full Name</strong><br>{{ $user->name }}</p>
                <p><strong>Email</strong><br>{{ $user->email }}</p>
                <p><strong>Phone Number</strong><br>{{ $user->no_hp ?? '-' }}</p>
                <p><strong>Address</strong><br>{{ $user->alamat ?? '-' }}</p>
            </div>
        </div>

        <hr>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label class="form-label">Full Name</label>
                    <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">Phone Number</label>
                    <input name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" class="form-control">
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label">Address</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                </div>
            </div>

            <button class="btn btn-warning mt-2">Edit Profile</button>
        </form>
    </div>

</div> <!-- END profile-page -->

@endsection
