<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita mendefinisikan semua routing untuk aplikasi
| Pemesanan Villa Bali Dream House.
|
*/

/* ============================
   1. HALAMAN UTAMA (LANDING PAGE)
   ============================ */
Route::get('/', function () {
    // Menampilkan halaman utama website
    return view('landing');
})->name('landing');


/* ============================
   2. ROUTE CRUD DATA VILLA
   ============================ */
// CRUD otomatis (index, show, create, store, edit, update, destroy)
Route::resource('villas', VillaController::class);


/* ============================
   3. ROUTE PEMESANAN VILLA
   ============================ */
// CRUD otomatis untuk pemesanan
Route::resource('pemesanans', PemesananController::class);

// Route khusus: buat pemesanan langsung dari halaman villa
// Contoh URL: /villas/1/pesan
Route::get('/villas/{id}/pesan', [PemesananController::class, 'create'])
    ->name('villas.pesan');


/* ============================
   4. ROUTE PEMBAYARAN
   ============================ */
// CRUD otomatis untuk pembayaran
Route::resource('pembayarans', PembayaranController::class);

// Route khusus: pembayaran berdasarkan pemesanan tertentu
// Contoh URL: /pemesanan/3/bayar
Route::get('/pemesanan/{id}/bayar', [PembayaranController::class, 'create'])
    ->name('pemesanan.bayar');


/* ============================
   5. OPSIONAL (CEK ROUTE)
   ============================ */
// Kamu bisa menjalankan "php artisan route:list" di terminal
// untuk melihat semua route aktif beserta nama-namanya.