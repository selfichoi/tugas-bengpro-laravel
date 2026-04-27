<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    // Pastikan nama tabelnya benar (biasanya tanpa 's' sesuai database kamu)
    protected $table = 'detail_periksa';

    // WAJIB tambahkan fillable ini untuk memperbaiki error MassAssignmentException
    protected $fillable = [
        'id_periksa',
        'id_obat',
    ];

    public function periksa()
    {
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}