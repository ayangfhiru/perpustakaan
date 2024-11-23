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
        Schema::create('peminjaman', function (Blueprint $blueprint) {
            $blueprint->id('id_peminjaman');
            $blueprint->foreignId('id_buku')->constrained('buku', 'id_buku');
            $blueprint->foreignId('id_anggota')->constrained('anggota', 'id_anggota');
            $blueprint->string('tanggal_pinjam');
            $blueprint->string('tanggal_kembali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
