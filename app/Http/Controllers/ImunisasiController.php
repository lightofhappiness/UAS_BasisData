<?php

namespace App\Http\Controllers;

use App\Models\ImunisasiModel;
use App\Models\WargaModel;
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

        $warga = WargaModel::findOrFail($wargaId);
        
        ImunisasiModel::create([
            'warga_id' => $warga->id,
            'jenis_imunisasi' => $request->jenis_imunisasi,
            'tanggal_imunisasi' => $request->tanggal_imunisasi,
        ]);

        return redirect()->route('warga.show', $warga->id)->with('success', 'Imunisasi berhasil dicatat!');
    }

    public function index()
{
    $imunisasi = ImunisasiModel::with('warga')->get(); // Mengambil semua data dengan relasi warga
    return view('imunisasi.index', compact('imunisasi'));
}
    // Menampilkan daftar imunisasi untuk warga tertentu
    public function show($wargaId)
    {
        $warga = WargaModel::findOrFail($wargaId);
        $imunisasi = $warga->imunisasies; // Relasi antara warga dan imunisasi
        return view('imunisasi.show', compact('warga', 'imunisasi'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'jenis_imunisasi' => 'required|string|max:255',
        'tanggal_pemberian' => 'required|date',
        'dosis' => 'required|string|max:50',
        'petugas' => 'nullable|string|max:255',
    ]);

    $imunisasi = ImunisasiModel::findOrFail($id);
    $imunisasi->update($validatedData);

    return redirect()->route('imunisasi.index')->with('success', 'Data imunisasi berhasil diperbarui.');
}
// Update
public function destroy($id)
{
    $imunisasi = ImunisasiModel::findOrFail($id);
    $imunisasi->delete();

    return redirect()->route('imunisasi.index')->with('success', 'Data imunisasi berhasil dihapus.');
}

}
