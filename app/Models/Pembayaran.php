<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_id',
        'metode_pembayaran',
        'jumlah_bayar',
        'status_pembayaran',
        'tgl_pembayaran'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
