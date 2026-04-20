<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',     // REVISI: Ganti 'name' jadi 'nama' agar sinkron dengan DB
        'email', 
        'password', 
        'role', 
        'id_poli', 
        'alamat', 
        'no_ktp', 
        'no_hp', 
        'no_rm'
    ];

    // Relasi ke Poli (Setiap Dokter/User hanya milik satu Poli)
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    // Relasi ke Jadwal Periksa (Satu Dokter punya banyak Jadwal)
    public function jadwalPeriksas()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
    }
}