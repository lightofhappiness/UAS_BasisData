<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WargaModel;

class WargaController extends Controller
{
    
    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'nullable|string',
        ]);

        WargaModel::create($request->all());

        return redirect()->back()->with('success', 'Warga berhasil didaftarkan!');
    }
    
    public function show($id)
{
    // Misalnya, ambil data warga berdasarkan ID dari database
    $warga = WargaModel::find($id);

    // Jika data ditemukan, tampilkan detail
    if ($warga) {
        return view('warga.show', ['warga' => $warga]);
    }

    // Jika tidak ditemukan, kembalikan 404
    abort(404, 'Warga tidak ditemukan');
}

}
