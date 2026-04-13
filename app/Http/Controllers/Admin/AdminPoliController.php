<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class AdminPoliController extends Controller
{
    // Tampilkan semua data poli
    public function index()
    {
        $polis = Poli::all(); 
        return view('admin.polis.index', compact('polis')); 
    }

    // Tampilkan form tambah poli
    public function create()
    {
        return view('admin.polis.create'); 
    }

    // Simpan data poli baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Poli::create($validated);
        return redirect()->route('polis.index')->with('success', 'Poli berhasil ditambahkan');
    }

    // Menampilkan halaman edit (Ini yang tadi bikin error)
    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin.polis.edit', compact('poli'));
    }

    // Memproses update data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update($validated);

        return redirect()->route('polis.index')->with('success', 'Poli berhasil diupdate');
    }

    // Menghapus data poli
    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect()->route('polis.index')->with('success', 'Poli berhasil dihapus');
    }
}