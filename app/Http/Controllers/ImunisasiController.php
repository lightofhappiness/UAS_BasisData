<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Warga;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    // Menampilkan formulir untuk menambahkan imunisasi
    public function create($wargaId)
    {
        $warga = Warga::findOrFail($wargaId);
        return view('imunisasi.create', compact('warga'));
    }

    // Menyimpan data imunisasi
    public function store(Request $request, $wargaId)
    {
        $request->validate([
            'jenis_imunisasi' => 'required|string|max:255',
            'tanggal_imunisasi' => 'required|date',
        ]);

        $warga = Warga::findOrFail($wargaId);
        
        Imunisasi::create([
            'warga_id' => $warga->id,
            'jenis_imunisasi' => $request->jenis_imunisasi,
            'tanggal_imunisasi' => $request->tanggal_imunisasi,
        ]);

        return redirect()->route('warga.show', $warga->id)->with('success', 'Imunisasi berhasil dicatat!');
    }

    // Menampilkan daftar imunisasi untuk warga tertentu
    public function show($wargaId)
    {
        $warga = Warga::findOrFail($wargaId);
        $imunisasi = $warga->imunisasies; // Relasi antara warga dan imunisasi
        return view('imunisasi.show', compact('warga', 'imunisasi'));
    }
}
