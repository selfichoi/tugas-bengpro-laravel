<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    // Baris ini WAJIB ada karena nama tabel kamu 'periksa' bukan 'periksas'
    protected $table = 'periksa';

    protected $fillable = [
        'id_daftar_poli',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    public function daftarPoli()
    {
        return $this->belongsTo(\App\Models\DaftarPoli::class, 'id_daftar_poli');
    }

    public function detailPeriksas()
    {
        return $this->hasMany(\App\Models\DetailPeriksa::class, 'id_periksa');
    }
}