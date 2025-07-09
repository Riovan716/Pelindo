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
        Schema::create('rekomendasi_magangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kampus');
            $table->string('email_kampus');
            $table->string('email_dosen');
            $table->string('nama_dosen');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_magangs');
    }
};
