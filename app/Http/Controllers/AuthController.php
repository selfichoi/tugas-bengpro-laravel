<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'dokter') {
                return redirect()->route('dokter.dashboard');
            } else {
                return redirect()->route('pasien.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau Password Salah!']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama'     => ['required', 'string', 'max:255'],
            'alamat'   => ['required', 'string', 'max:255'],
            'no_ktp'   => ['required', 'string', 'max:30', 'unique:users,no_ktp'],
            'no_hp'    => ['required', 'string', 'max:20'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // 2. Logika Generate no_rm Otomatis
        // Kita hitung jumlah pasien yang sudah ada untuk menentukan nomor urut
        $countPasien = User::where('role', 'pasien')->count();
        $nextId = $countPasien + 1;
        
        // Format: YYYYMM-XXX (Contoh: 202405-001)
        $no_rm = date('Ym') . '-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        // 3. Simpan data ke Database
        User::create([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'no_ktp'   => $request->no_ktp,
            'no_hp'    => $request->no_hp,
            'no_rm'    => $no_rm, // Nomor RM hasil generate
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'pasien',
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi Berhasil! Nomor RM Anda: ' . $no_rm);
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}