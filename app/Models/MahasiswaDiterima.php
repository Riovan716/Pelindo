<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaDiterima extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_diterima';

    protected $fillable = [
        'pendaftar_id',
        'nama',
        'email',
        'nomor_telepon',
        'asal_kampus',
        'lowongan_id',
        'tanggal_diterima',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }
} 