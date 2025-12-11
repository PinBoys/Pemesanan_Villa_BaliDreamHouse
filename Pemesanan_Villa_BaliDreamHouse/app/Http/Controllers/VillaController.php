<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    // 🔹 Menampilkan semua villa
    public function index()
    {
        $villas = Villa::all();
        return view('villas.index', compact('villas'));
    }

    // 🔹 Form tambah villa
    public function create()
    {
        return view('villas.create');
    }

    // 🔹 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_villa' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'harga_per_malam' => 'required|numeric',
            'kapasitas' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'jumlah_kamar_mandi' => 'required|integer',
        ]);

        Villa::create($request->all());
        return redirect()->route('villas.index')->with('success', 'Data villa berhasil ditambahkan.');
    }

    // 🔹 Tampilkan detail 1 villa
    public function show($id)
    {
        $villa = Villa::findOrFail($id);
        return view('villas.show', compact('villa'));
    }

    // 🔹 Form edit
    public function edit($id)
    {
        $villa = Villa::findOrFail($id);
        return view('villas.edit', compact('villa'));
    }

    // 🔹 Update data
    public function update(Request $request, $id)
    {
        $villa = Villa::findOrFail($id);
        $villa->update($request->all());
        return redirect()->route('villas.index')->with('success', 'Data villa berhasil diperbarui.');
    }

    // 🔹 Hapus data
    public function destroy($id)
    {
        $villa = Villa::findOrFail($id);
        $villa->delete();
        return redirect()->route('villas.index')->with('success', 'Data villa berhasil dihapus.');
    }
}