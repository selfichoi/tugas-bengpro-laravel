<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPoliController extends Controller
{
    /**
     * Tampilkan Halaman Riwayat & Pendaftaran Poli untuk Pasien
     */
    public function index()
    {
        $id_pasien = Auth::user()->id;

        // 1. Ambil daftar poliklinik untuk form pendaftaran (dropdown)
        $polis = Poli::with('dokters')->get();

        // 2. Ambil riwayat pendaftaran pasien beserta relasinya
        $riwayat_daftar = DaftarPoli::with(['jadwal.dokter', 'periksas'])
            ->where('id_pasien', $id_pasien)
            ->orderBy('created_at', 'desc')
            ->get();

        // (Pastikan nama view disesuaikan dengan struktur folder resources/views milikmu)
        return view('pasien.daftar-poli.index', compact('polis', 'riwayat_daftar'));
    }

    /**
     * API / AJAX: Ambil jadwal dokter berdasarkan ID Poli yang dipilih
     */
    public function getJadwalByPoli($idPoli)
    {
        // Mencari jadwal periksa aktif berdasarkan poli yang dipilih
        $jadwals = JadwalPeriksa::with('dokter')
            ->whereHas('dokter', function($q) use ($idPoli) {
                $q->where('id_poli', $idPoli);
            })
            // Opsional: hanya tampilkan jadwal yang statusnya aktif jika kamu punya kolom status
            // ->where('status', 'aktif') 
            ->get();

        return response()->json($jadwals);
    }

    /**
     * Simpan Data Pendaftaran Poli
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Form
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal_periksa,id',
            'keluhan'   => 'required|string|max:255',
        ], [
            'id_jadwal.required' => 'Pilih jadwal dokter terlebih dahulu.',
            'keluhan.required' => 'Keluhan pasien wajib diisi.'
        ]);

        $id_pasien = Auth::user()->id;

        // 2. Logika Cek Pendaftaran Ganda
        // Mencegah pasien mendaftar di jadwal yang sama saat status periksa masih "0" (belum periksa)
        $cekDaftar = DaftarPoli::where('id_pasien', $id_pasien)
            ->where('id_jadwal', $request->id_jadwal)
            ->where('status_periksa', 0)
            ->first();

        if ($cekDaftar) {
            return redirect()->back()
                ->with('error', 'Pendaftaran gagal: Anda sudah terdaftar pada jadwal ini dan belum diperiksa.');
        }

        // 3. Logika Pembuatan Nomor Antrean Otomatis
        // Hitung jumlah pasien yang mendaftar di jadwal yang SAMA pada HARI INI
        $jumlahAntrean = DaftarPoli::where('id_jadwal', $request->id_jadwal)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        // Nomor antrean baru = jumlah pasien terdaftar + 1
        $noAntrianBaru = $jumlahAntrean + 1;

        // 4. Simpan Data Pendaftaran ke Database
        DaftarPoli::create([
            'id_pasien'      => $id_pasien,
            'id_jadwal'      => $request->id_jadwal,
            'keluhan'        => $request->keluhan,
            'no_antrian'     => $noAntrianBaru,
            'status_periksa' => 0 // Default: Belum diperiksa
        ]);

        return redirect()->route('daftar-poli.index')
            ->with('success', 'Pendaftaran Poliklinik berhasil. Nomor antrean Anda: ' . $noAntrianBaru);
    }
}