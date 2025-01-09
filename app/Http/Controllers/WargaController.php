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

    public function index()
{
    $wargas = Warga::all(); // Mengambil semua data warga
    return view('warga.index', compact('warga')); // Tampilkan di view
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


public function edit($id)
{
    $warga = WargaModel::findOrfail($id);
    return view('warga.edit', compact('warga'));
}

public function update(Request $request, $id)
{
    $warga = WargaModel::findOrfail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
    ]);

    $warga->update([
        'name' => $request->name,
        'age' => $request->age,
    ]);

    return redirect()->route('warga.index'); // Kembali ke daftar warga
}
public function destroy ($id) {
    $warga = WargaModel::findOrFail($id);
    $warga->delete();

    return redirect()->route('warga.index')->with('success', 'Data Warga berhasil dihapus.');
}


}
