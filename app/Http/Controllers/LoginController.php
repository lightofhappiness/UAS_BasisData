<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Menangani login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Mencoba login dengan kredensial yang diberikan
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika login berhasil, redirect ke halaman dashboard
            return redirect()->route('warga');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

   
}
