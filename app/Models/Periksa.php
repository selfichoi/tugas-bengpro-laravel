<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
public function daftarPoli() {
    return $this->belongsTo(DaftarPoli::class, 'id_daftar_poli');
}
public function detailPeriksas() {
    return $this->hasMany(DetailPeriksa::class, 'id_periksa');
}}
