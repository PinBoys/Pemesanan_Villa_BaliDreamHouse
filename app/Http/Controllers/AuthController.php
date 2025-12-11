<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        // hanya tamu bisa lihat login/register; user login hanya bisa logout
        $this->middleware('guest')->except(['logout']);
        $this->middleware('auth')->only(['logout']);
    }

    // ===============================
    // 🔹 LOGIN
    // ===============================
    public function showLogin()
    {
        return view('login.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 🔥 setelah login → redirect ke halaman profile
            return redirect()->intended(route('profile'));
        }

        throw ValidationException::withMessages([
            'email' => __('email or password is incorrect'),
        ]);
    }

    // ===============================
    // 🔹 REGISTER
    // ===============================
    public function showRegister()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'no_hp' => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:1000',
        ]);

        try {
            $user = User::create([
                'name' => $validated['nama_pelanggan'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'no_hp' => $validated['no_hp'] ?? null,
                'alamat' => $validated['alamat'] ?? null,
            ]);

            event(new Registered($user));

            Auth::login($user);

            // 🔥 setelah register → redirect ke profile
            return redirect()->route('profile')
                ->with('success', 'Registrasi berhasil. Selamat datang!');
        } catch (QueryException $e) {
    return back()->withInput()
        ->withErrors(['email' => $e->getMessage()]);
}

    }

    // ===============================
    // 🔹 LOGOUT
    // ===============================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah logout.');
    }
}
