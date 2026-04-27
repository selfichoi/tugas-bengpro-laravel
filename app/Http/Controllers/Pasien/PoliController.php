<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function get()
    {
        $polis = Poli::all();
        
        /** * FIX: Pastikan memanggil relasi 'dokter' agar nama aslinya muncul, 
         * bukan teks manual 'Dr. Dokter'
         */
        $jadwals = JadwalPeriksa::with('dokter')->get();

        return view('pasien.daftar', compact('polis', 'jadwals'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal_periksa,id',
            'keluhan' => 'required|string',
        ]);

        // Logika simpan pendaftaran poli di sini...

        return redirect()->route('pasien.daftar')
            ->with('message', 'Pendaftaran Berhasil!')
            ->with('type', 'success');
    }
}