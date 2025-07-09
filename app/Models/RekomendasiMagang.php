<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekomendasiMagang extends Model
{
    protected $fillable = [
        'nama_kampus',
        'email_kampus',
        'email_dosen',
        'nama_dosen',
        'file',
    ];

    public function nama_mahasiswa()
    {
        return $this->hasMany(NamaMahasiswa::class);
    }
}
