<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = User::where('role', 'dokter')->with('poli')->get();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('admin.dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'id_poli'  => 'required',
            'no_hp'    => 'required',
        ]);

        User::create([
            'nama'     => $request->nama, 
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'dokter',
            'id_poli'  => $request->id_poli,
            'alamat'   => $request->alamat,
            'no_hp'    => $request->no_hp,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan!');
    }

    public function edit(User $dokter)
    {
        $polis = Poli::all();
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request, User $dokter)
    {
        // Validasi menggunakan 'nama' sesuai database
        $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $dokter->id,
            'id_poli' => 'required',
            'no_hp'   => 'required',
        ]);

        $data = [
            'nama'    => $request->nama,
            'email'   => $request->email,
            'id_poli' => $request->id_poli,
            'alamat'  => $request->alamat,
            'no_hp'   => $request->no_hp,
        ];

        if ($request->filled('password')) {
            // Cek password lama
            if (Hash::check($request->password, $dokter->password)) {
                return redirect()->back()
                    ->withErrors(['password' => 'Password baru tidak boleh sama dengan password lama!'])
                    ->withInput();
            }
            $data['password'] = Hash::make($request->password);
        }

        $dokter->update($data);

        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil diupdate!');
    }

    public function destroy(User $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus!');
    }
}