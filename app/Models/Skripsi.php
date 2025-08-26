<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $table = 'skripsi';
    
    protected $fillable = [
        'judul',
        'penulis',
        'nim',
        'program_studi',
        'asal_kampus',
        'tahun',
        'abstrak',
        'kata_kunci',
        'file_path',
        'cover_image',
        'status',
        'dosen_pembimbing',
        'kategori',
        'jumlah_halaman'
    ];

    protected $casts = [
        'tahun' => 'integer',
        'jumlah_halaman' => 'integer',
    ];

    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }

    public function getCoverUrlAttribute()
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : null;
    }
}
