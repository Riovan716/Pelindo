<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKp extends Model
{
    use HasFactory;

    protected $table = 'laporan_kp';
    
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
        'instansi_tujuan',
        'periode_magang',
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
