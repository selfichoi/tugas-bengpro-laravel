<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminPoliController; 
use Illuminate\Support\Facades\Route;

// Rute Default (Biar kalau buka localhost:8000 langsung ke login)
Route::get('/', function () {
    return redirect()->route('login');
});

// --- RUTE AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Pakai GET dan pastikan alamatnya '/logout'
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --- RUTE DASHBOARD (DILINDUNGI MIDDLEWARE) ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');
});

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Tambahkan ini buat CRUD Poli 
Route::resource('polis', AdminPoliController::class);
});