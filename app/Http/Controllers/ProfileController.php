<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // hanya untuk user terautentikasi
    }

    // Tampilkan halaman profile
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Perbarui data profil (name, no_hp, alamat)
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:1000',
        ]);

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    // Update photo profil (upload)
    public function updatePhoto(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:5120' // max 5MB
        ]);

        $file = $request->file('profile_photo');
        $filename = time() . '_' . Str::slug($user->name) . '.' . $file->getClientOriginalExtension();

        // Simpan ke public/profile_photos
        $file->move(public_path('profile_photos'), $filename);

        // (opsional) hapus file lama
        if ($user->profile_photo && file_exists(public_path('profile_photos/' . $user->profile_photo))) {
            @unlink(public_path('profile_photos/' . $user->profile_photo));
        }

        $user->profile_photo = $filename;
        $user->save();

        return back()->with('success', 'Foto profil berhasil diupdate.');
    }
}
