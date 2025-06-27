<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'kualifikasi',
        'keahlian',
        'foto',
    ];

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class);
    }
}
