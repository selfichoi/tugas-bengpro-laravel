<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
public function pasien() {
    return $this->belongsTo(User::class, 'id_pasien');
}
public function jadwalPeriksa() {
    return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
}}
