<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeriksaPasienController extends Controller
{
    /**
     * Dashboard / Index Dokter
     */
    public function index()
    {
        $id_dokter = Auth::user()->id;

        // Ambil data pasien sesuai jadwal dokter yang login
        $daftarPasien = DaftarPoli::whereHas('jadwal', function ($query) use ($id_dokter) {
            $query->where('id_dokter', $id_dokter);
        })
        ->with(['pasien', 'periksas'])
        ->get();

        return view('components.dokter.periksa-pasien.index', compact('daftarPasien'));
    }

    /**
     * Form Periksa Pasien
     */
    public function create($id)
    {
        // Ambil data pendaftaran pasien
        $daftarPoli = DaftarPoli::with('pasien')->findOrFail($id);

        // Ambil data obat
        $obats = Obat::all();

        return view('components.dokter.periksa-pasien.create', compact('daftarPoli', 'obats'));
    }

    /**
     * Dashboard Dokter
     */
    public function dashboard()
    {
        return view('components.dokter.dashboard');
    }

    /**
     * Simpan hasil pemeriksaan pasien
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_daftar_poli' => 'required',
        ]);

        DB::beginTransaction();

        try {

            // Simpan data pemeriksaan
            Periksa::create([
                'id_daftar_poli' => $request->id_daftar_poli,
                'tgl_periksa' => now(),
                'catatan' => $request->catatan,
                'biaya_periksa' => str_replace(['Rp', '.', ' '], '', $request->total_harga ?? 0),
            ]);

            // Update status pasien menjadi sudah diperiksa
            DaftarPoli::where('id', $request->id_daftar_poli)
                ->update([
                    'status_periksa' => 1
                ]);

            DB::commit();

            return redirect()
                ->route('periksa-pasien.index')
                ->with('message', 'Pemeriksaan berhasil disimpan');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }
}