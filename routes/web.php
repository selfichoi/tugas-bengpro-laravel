<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminPoliController; 
use App\Http\Controllers\Admin\ObatController; // REVISI MODUL 9
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// --- RUTE AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --- GRUP RUTE ADMIN ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('polis', AdminPoliController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);

    // REVISI MODUL 9: Pakai 'obat' agar sesuai route('obat.index')
    Route::resource('obat', ObatController::class);
});

// --- GRUP RUTE DOKTER ---
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');
});

// --- GRUP RUTE PASIEN ---
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');
});