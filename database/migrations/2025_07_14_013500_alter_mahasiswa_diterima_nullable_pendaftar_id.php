<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mahasiswa_diterima', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftar_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('mahasiswa_diterima', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftar_id')->nullable(false)->change();
        });
    }
}; 