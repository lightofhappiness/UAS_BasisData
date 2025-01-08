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

        $statusStunting = $this->calculateStuntingStatus($request->tinggi_badan, $request->berat_badan, $request->usia);

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
    private function calculateStuntingStatus($tinggiBadan, $beratBadan, $usia)
    {
        // Lakukan perhitungan Z-score atau bandingkan dengan standar WHO
        // Ini adalah contoh sederhana, sebaiknya sesuaikan dengan data medis
        if ($tinggiBadan < 85) {
            return 'Stunted';
        } elseif ($tinggiBadan >= 85 && $tinggiBadan <= 100) {
            return 'Normal';
        } else {
            return 'Severe Stunting';
        }
    }
}
