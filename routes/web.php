<?php
use illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
#use App\Http\Controllers\WargaController;
#use App\Http\Controllers\SettingsController;
#use App\Http\Controllers\LaporanKesehatanController;
#use App\Http\Controllers\ProfilController;
#use App\Http\Controllers\ImunisasiController;

use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'index']);
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
