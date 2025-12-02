<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_villa',
        'lokasi',
        'deskripsi',
        'harga_per_malam',
        'kapasitas',
        'jumlah_kamar',
        'jumlah_kamar_mandi',
        'status_villa',
        'foto_villa'
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}