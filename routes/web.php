<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AuthController;


/* ============================
   1️ HALAMAN UTAMA (LANDING PAGE)
   ============================ */
Route::get('/', function () {
    return view('landing'); // resources/views/landing.blade.php
})->name('landing');

Route::get('/availability', function () {
    return view('availability');
})->name('availability');


Route::get('/villa', function () {
    return view('villa');
})->name('villa');


/* ============================
   2️ CRUD DATA VILLA
   ============================ */
Route::resource('villas', VillaController::class);


/* ============================
   3️ PEMESANAN VILLA
   ============================ */
Route::resource('pemesanans', PemesananController::class);

// Route khusus pemesanan villa langsung dari halaman villa
Route::get('/villas/{id}/pesan', [PemesananController::class, 'create'])
    ->name('villas.pesan');


/* ============================
   4️ PEMBAYARAN
   ============================ */
Route::resource('pembayarans', PembayaranController::class);

// Route khusus: pembayaran berdasarkan id pemesanan
Route::get('/pemesanan/{id}/bayar', [PembayaranController::class, 'create'])
    ->name('pemesanan.bayar');


/* ============================
   5️ AUTENTIKASI (LOGIN, REGISTER, LOGOUT)
   ============================ */
// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Halaman register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/* ============================
   6️ PASSWORD RESET (LUPA PASSWORD)
   ============================ */

//  Form untuk request reset password (input email)
Route::get('/password/reset', function () {
    return view('auth.passwords.email'); // resources/views/auth/passwords/email.blade.php
})->name('password.request');

//  Proses kirim link reset password ke email
Route::post('/password/email', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');

//  Form untuk memasukkan password baru (klik link dari email)
Route::get('/password/reset/{token}', function ($token, Request $request) {
    return view('auth.passwords.reset')->with([
        'token' => $token,
        'email' => $request->query('email'),
    ]);
})->name('password.reset');

//  Proses update password baru
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

use App\Http\Controllers\AvailabilityController;
Route::get('/check-availability', [AvailabilityController::class, 'index'])
->name('availability.index');



/* ============================
   7️ CEK ROUTE (DEBUG)
   ============================ */
// Jalankan di terminal untuk melihat semua route aktif:
// php artisan route:list

/* ============================
   8️ PROFILE USER
   ============================ */
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
});