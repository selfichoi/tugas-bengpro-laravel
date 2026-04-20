<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('dokter', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('alamat')->nullable();
        $table->string('no_hp');
        // Relasi ke tabel poli
        $table->foreignId('id_poli')->constrained('poli')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
