<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Poli::create(['nama_poli' => 'Poli Umum', 'keterangan' => 'Pemeriksaan umum']);
    \App\Models\Poli::create(['nama_poli' => 'Poli Gigi', 'keterangan' => 'Pemeriksaan gigi']);
}
}
