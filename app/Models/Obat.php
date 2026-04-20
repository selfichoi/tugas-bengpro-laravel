<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';

    // Ini kunci biar stok kamu bisa tersimpan dan nampil!
    protected $fillable = [
        'nama_obat', 
        'kemasan', 
        'harga', 
        'stok'
    ];
}