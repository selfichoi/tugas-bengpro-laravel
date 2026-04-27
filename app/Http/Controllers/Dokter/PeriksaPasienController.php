<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaPasienController extends Controller
{
    /**
     * Dashboard / Index Dokter
     */
    public function index()
    {
        $id_dokter = Auth::user()->id;

        // Ambil data pasien sesuai jadwal dokter yang login
        // Variabel disamakan $daftarPasien supaya file index.blade kamu nggak error
        $daftarPasien = DaftarPoli::whereHas('jadwal', function($query) use ($id_dokter) {
            $query->where('id_dokter', $id_dokter);
        })
        ->with(['pasien', 'periksas']) 
        ->get();

        // FIX: Alamat harus pakai components. karena sudah kamu pindah
        return view('components.dokter.periksa-pasien.index', compact('daftarPasien'));
    }

    /**
     * Form Periksa Pasien
     */
    public function create($id)
    {
        // Mencari data pendaftaran pasien
        $daftarPoli = DaftarPoli::with('pasien')->findOrFail($id);
        
        // Mengambil data obat (Modul 9)
        $obats = Obat::all();

        // FIX: Alamat view form periksa di dalam folder components
        return view('components.dokter.periksa-pasien.create', compact('daftarPoli', 'obats'));
    }

    /**
     * TAMPILAN DASHBOARD (Solusi Error image_a056c3.jpg)
     * Tambahkan fungsi ini jika rute dashboard kamu mengarah ke sini
     */
    public function dashboard()
    {
        return view('components.dokter.dashboard');
    }

    public function store(Request $request)
    {
        // Logika simpan hasil periksa tetap di sini sesuai modul
    }
}