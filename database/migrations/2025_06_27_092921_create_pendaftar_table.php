<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lowongan_id')->constrained('lowongan')->onDelete('cascade');
            $table->string('nama');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('asal_kampus');
            $table->json('berkas'); // untuk menyimpan array file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
}
