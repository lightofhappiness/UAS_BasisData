<?php
namespace App\Http\Controllers;

use App\Models\StuntingModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;

class StuntingController extends Controller
{
    // Menampilkan data stunting
    public function index()
    {
        $stuntings = StuntingModel::with('warga')->get();
        return view('stunting.index', compact('stuntings'));
    }

    // Menambahkan data stunting
    public function create()
    {
        $wargas = WargaModel::all();
        return view('stunting.create', compact('wargas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'usia' => 'required|integer',
        ]);

        $statusStunting = $this->analisisStunting(
            $validated['tinggi_badan'].
            $validated['berat_badan'],
        );

        StuntingModel::create([
            'warga_id' => $request->warga_id,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'usia' => $request->usia,
            'status_stunting' => $statusStunting,
        ]);

        return redirect()->route('stunting.index');
    }

    // Fungsi untuk menghitung status stunting
    private function analisisStunting($data)
    {
        // Contoh logika sederhana: Tinggi badan ideal = usia (bulan) × 2,5 cm
        $tinggiIdeal = $data['usia_bulan'] * 2.5; 
        
        // Bandingkan tinggi badan anak dengan tinggi ideal
        if ($data['tinggi_badan'] < $tinggiIdeal) {
            return 'Stunting'; // Jika lebih rendah dari tinggi ideal
        }
        return 'Normal'; // Jika sesuai atau lebih tinggi dari tinggi ideal
    }
    

    // Menampilkan daftar data stunting


// Menampilkan detail data stunting tertentu
public function show($id)
{
    $stunting = StuntingModel::with('warga')->findOrFail($id);
    return view('stunting.show', compact('stunting'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'tinggi_badan' => 'required|numeric|min:10',
        'berat_badan' => 'required|numeric|min:1',
        'usia_bulan' => 'required|integer|min:1',
        'hasil' => 'nullable|string|max:255',
    ]);

    $validatedData['hasil'] = $this->analisisStunting($validatedData);

    $stunting = StuntingModel::findOrFail($id);
    $stunting->update($validatedData);

    return redirect()->route('stunting.index')->with('success', 'Data stunting berhasil diperbarui.');
}

public function destroy($id)
{
    $stunting = StuntingModel::findOrFail($id);
    $stunting->delete();

    return redirect()->route('stunting.index')->with('success', 'Data stunting berhasil dihapus.');
}


}
