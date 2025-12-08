<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/* ============================
   1️ HALAMAN UTAMA
   ============================ */
Route::get('/', function () {
    return view('landing');
})->name('landing');

/* ============================
   2️ CRUD DATA VILLA
   ============================ */
Route::resource('villas', VillaController::class);

/* ============================
   3️ PEMESANAN VILLA
   ============================ */
Route::resource('pemesanans', PemesananController::class);
Route::get('/villas/{id}/pesan', [PemesananController::class, 'create'])->name('villas.pesan');

/* ============================
   4️ PEMBAYARAN
   ============================ */
Route::resource('pembayarans', PembayaranController::class);
Route::get('/pemesanan/{id}/bayar', [PembayaranController::class, 'create'])->name('pemesanan.bayar');

/* ============================
   5️ AUTENTIKASI
   ============================ */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ============================
   6️ PASSWORD RESET
   ============================ */
Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');

Route::post('/password/email', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/password/reset/{token}', function ($token, Request $request) {
    return view('auth.passwords.reset')->with([
        'token' => $token,
        'email' => $request->query('email'),
    ]);
})->name('password.reset');

Route::post('/password/reset', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');


/* ============================
   8️ PROFILE USER (DIPERBAIKI)
   ============================ */
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    // Route yang hilang & menyebabkan error → sekarang sudah ditambahkan
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
});
