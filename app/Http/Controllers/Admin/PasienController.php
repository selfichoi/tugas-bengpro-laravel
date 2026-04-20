<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function index()
    {
        // Mengambil semua user dengan role pasien
        $pasiens = User::where('role', 'pasien')->get();
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        // Menampilkan form tambah pasien
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        // Validasi input sesuai Modul 8
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'no_ktp'   => 'required|string|max:16|unique:users',
            'no_hp'    => 'required|string|max:15',
            'alamat'   => 'required|string',
        ]);

        // Simpan data ke tabel users
        User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'no_ktp'   => $request->no_ktp,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
            'role'     => 'pasien', // Pastikan role-nya pasien
        ]);

        return redirect()->route('pasien.index')->with('message', 'Data Pasien berhasil ditambahkan!');
    }

    public function edit(User $pasien)
    {
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, User $pasien)
    {
        // Validasi update (Email & KTP unik kecuali untuk diri sendiri)
        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|string|email|max:255|unique:users,email,' . $pasien->id,
            'no_ktp' => 'required|string|max:16|unique:users,no_ktp,' . $pasien->id,
            'no_hp'  => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $data = [
            'nama'   => $request->nama,
            'email'  => $request->email,
            'no_ktp' => $request->no_ktp,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
        ];

        // LOGIKA TAMBAHAN: Cek jika password diisi
        if ($request->filled('password')) {
            // Validasi: Password baru tidak boleh sama dengan password lama
            if (Hash::check($request->password, $pasien->password)) {
                return redirect()->back()
                    ->withErrors(['password' => 'Password baru tidak boleh sama dengan password lama!'])
                    ->withInput();
            }
            $data['password'] = Hash::make($request->password);
        }

        $pasien->update($data);

        return redirect()->route('pasien.index')->with('message', 'Data Pasien berhasil diperbarui!');
    }

    public function destroy(User $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('message', 'Data Pasien berhasil dihapus!');
    }
}