<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function create($pemesanan_id)
    {
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);
        return view('pembayaran.form', compact('pemesanan'));
    }

    public function store(Request $request, $pemesanan_id)
    {
        $request->validate([
            'metode_pembayaran' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'tgl_pembayaran' => 'required|date',
        ]);

        Pembayaran::create([
            'pemesanan_id' => $pemesanan_id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_bayar' => $request->jumlah_bayar,   // sesuai model
            'status_pembayaran' => 'pending',
            'tgl_pembayaran' => $request->tgl_pembayaran,   // sesuai model
        ]);

        // Ubah status pemesanan setelah bayar
        Pemesanan::where('id', $pemesanan_id)->update([
            'status_pemesanan' => 'menunggu_verifikasi'
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Pembayaran berhasil dibuat!');
    }
}
