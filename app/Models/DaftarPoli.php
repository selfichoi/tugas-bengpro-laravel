<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    use HasFactory;

    protected $table = 'daftar_poli';

    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'keluhan',
        'no_antrian',
        'status_periksa'
    ];

    /**
     * Relasi ke Jadwal Periksa
     */
    public function jadwal()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    /**
     * Relasi ke Pasien (User)
     */
    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    /**
     * REVISI WAJIB: Relasi ke tabel Periksa
     * Ini supaya badge "Sudah Diperiksa" di file Index kamu bisa muncul
     */
    public function periksas()
    {
        return $this->hasMany(Periksa::class, 'id_daftar_poli');
    }
}