<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $fillable = [
        'lowongan_id',
        'nama',
        'nomor_telepon',
        'email',
        'asal_kampus',
        'berkas',
    ];

    protected $casts = [
        'berkas' => 'array',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}