<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPasienController extends Controller
{
    public function index()
    {
        // Mengambil data periksa dengan relasi yang benar ('jadwal' bukan 'jadwalPeriksa')
        $riwayatPasien = Periksa::whereHas('daftarPoli.jadwal', function ($query) {
            $query->where('id_dokter', Auth::id());
        })->with([
            'daftarPoli.pasien',
            'daftarPoli.jadwal.dokter',
            'detailPeriksas.obat'
        ])->orderBy('tgl_periksa', 'desc')->get();

        /**
         * TRICK: Kita duplikat relasi 'jadwal' ke 'jadwalPeriksa' 
         * supaya file Blade kamu yang panggil 'jadwalPeriksa' nggak error.
         */
        foreach ($riwayatPasien as $item) {
            $item->daftarPoli->setRelation('jadwalPeriksa', $item->daftarPoli->jadwal);
        }

        return view('components.dokter.riwayat-pasien.index', compact('riwayatPasien'));
    }

    public function show($id)
    {
        // Melihat detail riwayat periksa pasien tertentu
        $periksa = Periksa::whereHas('daftarPoli.jadwal', function ($query) {
            $query->where('id_dokter', Auth::id());
        })->with([
            'daftarPoli.pasien',
            'daftarPoli.jadwal.dokter.poli',
            'detailPeriksas.obat'
        ])->findOrFail($id);

        /**
         * FIX ERROR: Duplikat relasi agar Blade bisa baca 'jadwalPeriksa'
         * Ini supaya baris 39 di show.blade.php kamu lancar jaya!
         */
        $periksa->daftarPoli->setRelation('jadwalPeriksa', $periksa->daftarPoli->jadwal);

        return view('components.dokter.riwayat-pasien.show', compact('periksa'));
    }
}