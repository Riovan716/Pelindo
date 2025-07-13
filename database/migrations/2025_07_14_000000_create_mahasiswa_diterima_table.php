<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaDiterimaTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa_diterima', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftar_id');
            $table->string('nama');
            $table->string('email');
            $table->string('nomor_telepon')->nullable();
            $table->string('asal_kampus')->nullable();
            $table->unsignedBigInteger('lowongan_id')->nullable();
            $table->timestamp('tanggal_diterima')->useCurrent();
            $table->timestamps();

            $table->foreign('pendaftar_id')->references('id')->on('pendaftar')->onDelete('cascade');
            $table->foreign('lowongan_id')->references('id')->on('lowongan')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa_diterima');
    }
} 