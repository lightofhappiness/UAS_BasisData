<?php

namespace App\Http\Controllers;

use App\Models\LaporanKesehatanModel;
use Illuminate\Http\Request;

class LaporanKesehatanController extends Controller
{
    // Menampilkan formulir untuk menambah laporan kesehatan
    public function create()
    {
        return view('laporan_kesehatan.create');
    }

    // Menyimpan laporan kesehatan
    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:warga,id',
            'tanggal_laporan' => 'required|date',
            'deskripsi' => 'required|string|max:255',
        ]);

        LaporanKesehatanModel::create([
            'warga_id' => $request->warga_id,
            'tanggal_laporan' => $request->tanggal_laporan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('laporan_kesehatan.index')->with('success', 'Laporan kesehatan berhasil disimpan!');
    }

    // Menampilkan daftar laporan kesehatan
    public function index()
    {
        $laporanKesehatan = LaporanKesehatanModel::all();
        return view('laporan_kesehatan.index', compact('laporanKesehatan'));
    }

    // Menampilkan detail laporan kesehatan
    public function show($id)
    {
        $laporan = LaporanKesehatanModel::findOrFail($id);
        return view('laporan_kesehatan.show', compact('laporan'));
    }

    public function update(Request $request, $id) { } // Update
public function destroy($id) {} // Delete
}
