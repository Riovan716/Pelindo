<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->string('status')->nullable()->after('asal_kampus');
        });
    }

    public function down()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}; 