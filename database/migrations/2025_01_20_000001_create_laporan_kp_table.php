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
        Schema::create('laporan_kp', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('nim');
            $table->string('program_studi');
            $table->integer('tahun');
            $table->text('abstrak');
            $table->string('kata_kunci');
            $table->string('file_path')->nullable();
            $table->string('cover_image')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->string('dosen_pembimbing');
            $table->string('instansi_tujuan');
            $table->string('periode_magang');
            $table->string('kategori')->nullable();
            $table->integer('jumlah_halaman')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kp');
    }
};
