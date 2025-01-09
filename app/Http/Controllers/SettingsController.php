<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class SettingsController extends Controller
{
    // Menampilkan halaman pengaturan
    public function index()
    {
        return view('setting.index');
    }

    // Mengupdate pengaturan seperti password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verifikasi password saat ini
        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
        }

        // Update password baru
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('setting.index')->with('success', 'Password berhasil diperbarui!');
    }
}
