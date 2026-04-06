<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::all(); // ambil semua data dari tabel poli
        return view('poli.index', compact('polis')); // lempar ke tampilan
    }
}