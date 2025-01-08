<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total warga
        $totalWarga = Warga::count();

        // Hitung kategori
        $jumlahBalita = Warga::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 5')->count();
        $jumlahLansia = Warga::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60')->count();
        $lakiLaki = Warga::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Warga::where('jenis_kelamin', 'Perempuan')->count();

        // Kirim data ke view
        return view('dashboard.index', compact('totalWarga', 'jumlahBalita', 'jumlahLansia', 'lakiLaki', 'perempuan'));
    }
}
