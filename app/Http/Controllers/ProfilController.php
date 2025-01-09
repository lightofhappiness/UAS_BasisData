<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    // Menampilkan halaman profil
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    // Mengupdate profil pengguna
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        
        // Jika password diubah
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
