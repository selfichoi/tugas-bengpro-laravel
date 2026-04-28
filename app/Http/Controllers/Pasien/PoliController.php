<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use App\Models\JadwalPeriksa;
use App\Models\DaftarPoli; // 🔥 penting
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 🔥 penting

class PoliController extends Controller
{
    /**
     * Tampilkan halaman daftar poli
     */
    public function get()
    {
        $polis = Poli::all();

        // Ambil jadwal + relasi dokter
        $jadwals = JadwalPeriksa::with('dokter')->get();

        return view('pasien.daftar', compact('polis', 'jadwals'));
    }

    /**
     * Proses submit pendaftaran
     */
    public function submit(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal_periksa,id',
            'keluhan' => 'required|string',
        ]);

        // Hitung nomor antrian berdasarkan jadwal yang dipilih
        $no_antrian = DaftarPoli::where('id_jadwal', $request->id_jadwal)->count() + 1;

        // 🔥 Simpan ke database
        DaftarPoli::create([
            'id_pasien' => Auth::id(),
            'id_jadwal' => $request->id_jadwal,
            'keluhan' => $request->keluhan,
            'no_antrian' => $no_antrian,
            'status_periksa' => 0
        ]);

        // Redirect dengan notifikasi
        return redirect()->route('pasien.daftar')
            ->with('message', 'Pendaftaran Berhasil!')
            ->with('type', 'success');
    }
}