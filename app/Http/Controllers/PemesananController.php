<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Villa;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $villas = Villa::all();
        return view('pemesanan.reservation', compact('villas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'villa_id' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'fullname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'special_request' => 'nullable',
            'payment_method' => 'required',
            'agree' => 'required'
        ]);

        Pemesanan::create([
            'villa_id' => $request->villa_id,
            'nama_pemesan' => $request->fullname,
            'email' => $request->email,
            'no_hp' => $request->phone,
            'tanggal_checkin' => $request->check_in,
            'tanggal_checkout' => $request->check_out,
            'jumlah_tamu' => 1, // jika belum ada input tamu
            'total_harga' => 0, // nanti hitung otomatis
            'status_pemesanan' => 'pending',
        ]);

        return redirect()->route('landing')
            ->with('success', 'Reservation successfully submitted!');
    }
}
