<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'villa_id',
        'nama_pemesan',
        'email',
        'no_hp',
        'tanggal_checkin',
        'tanggal_checkout',
        'jumlah_tamu',
        'total_harga',
        'status_pemesanan'
    ];

    // RELASI ke tabel villa
    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }

    // RELASI ke tabel pembayaran (1 pemesanan punya 1 pembayaran)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
