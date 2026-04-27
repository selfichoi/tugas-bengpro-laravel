<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email', 
        'password', 
        'role', 
        'id_poli', 
        'alamat', 
        'no_ktp', 
        'no_hp', 
        'no_rm'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke Poli sesuai Modul 7
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    /**
     * Relasi ke Jadwal Periksa (Modul 12)
     */
    public function jadwalPeriksas()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
    }
}