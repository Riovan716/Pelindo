<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('nama_mahasiswas', function (Blueprint $table) {
            $table->string('status')->nullable()->after('nama');
        });
    }

    public function down()
    {
        Schema::table('nama_mahasiswas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}; 