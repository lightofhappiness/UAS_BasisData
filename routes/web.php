<?php
use illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LaporanKesehatanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ImunisasiController;




// Halaman login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('login', [LoginController::class, 'login']);

// Proses logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Halaman register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Proses register
Route::post('register', [RegisterController::class, 'register']);
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Daftar Warga
Route::middleware('auth')->get('/warga', [WargaController::class, 'index'])->name('warga.index');

// Menambahkan warga baru
Route::middleware('auth')->get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
Route::middleware('auth')->post('/warga', [WargaController::class, 'store'])->name('warga.store');

// Menampilkan detail warga
Route::middleware('auth')->get('/warga/{id}', [WargaController::class, 'show'])->name('warga.show');

// Mengedit data warga
Route::middleware('auth')->get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
Route::middleware('auth')->put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');

// Menghapus data warga
Route::middleware('auth')->delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
// Daftar Laporan Kesehatan
Route::middleware('auth')->get('/laporan-kesehatan', [LaporanKesehatanController::class, 'index'])->name('laporan-kesehatan.index');

// Menambahkan laporan kesehatan
Route::middleware('auth')->get('/laporan-kesehatan/create', [LaporanKesehatanController::class, 'create'])->name('laporan-kesehatan.create');
Route::middleware('auth')->post('/laporan-kesehatan', [LaporanKesehatanController::class, 'store'])->name('laporan-kesehatan.store');

// Mengedit laporan kesehatan
Route::middleware('auth')->get('/laporan-kesehatan/{id}/edit', [LaporanKesehatanController::class, 'edit'])->name('laporan-kesehatan.edit');
Route::middleware('auth')->put('/laporan-kesehatan/{id}', [LaporanKesehatanController::class, 'update'])->name('laporan-kesehatan.update');

// Menghapus laporan kesehatan
Route::middleware('auth')->delete('/laporan-kesehatan/{id}', [LaporanKesehatanController::class, 'destroy'])->name('laporan-kesehatan.destroy');
// Daftar Imunisasi
Route::middleware('auth')->get('/imunisasi', [ImunisasiController::class, 'index'])->name('imunisasi.index');

// Menambahkan imunisasi baru
Route::middleware('auth')->get('/imunisasi/create', [ImunisasiController::class, 'create'])->name('imunisasi.create');
Route::middleware('auth')->post('/imunisasi', [ImunisasiController::class, 'store'])->name('imunisasi.store');

// Mengedit data imunisasi
Route::middleware('auth')->get('/imunisasi/{id}/edit', [ImunisasiController::class, 'edit'])->name('imunisasi.edit');
Route::middleware('auth')->put('/imunisasi/{id}', [ImunisasiController::class, 'update'])->name('imunisasi.update');

// Menghapus data imunisasi
Route::middleware('auth')->delete('/imunisasi/{id}', [ImunisasiController::class, 'destroy'])->name('imunisasi.destroy');
// Menampilkan profil pengguna
Route::middleware('auth')->get('/profil', [ProfilController::class, 'index'])->name('profil.index');

// Mengedit profil pengguna
Route::middleware('auth')->get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::middleware('auth')->put('/profil', [ProfilController::class, 'update'])->name('profil.update');
// Halaman pengaturan
Route::middleware('auth')->get('/settings', [SettingsController::class, 'index'])->name('settings.index');

// Mengubah pengaturan
Route::middleware('auth')->put('/settings', [SettingsController::class, 'update'])->name('settings.update');
Route::middleware('auth:sanctum')->get('/warga', [WargaController::class, 'index']);
Route::middleware('auth:sanctum')->post('/warga', [WargaController::class, 'store']);
Route::middleware('auth:sanctum')->put('/warga/{id}', [WargaController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/warga/{id}', [WargaController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/warga', [WargaController::class, 'index']);
Route::middleware('auth:sanctum')->post('/warga', [WargaController::class, 'store']);
Route::middleware('auth:sanctum')->put('/warga/{id}', [WargaController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/warga/{id}', [WargaController::class, 'destroy']);
