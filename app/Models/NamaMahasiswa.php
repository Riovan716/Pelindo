<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NamaMahasiswa extends Model
{
    protected $fillable = [
        'rekomendasi_magang_id',
        'nama',
        'status',
    ];

    public function rekomendasiMagang()
    {
        return $this->belongsTo(RekomendasiMagang::class);
    }
}
