<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasio extends Model
{
    use HasFactory;

    protected $table = 'datasio';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_berakhir',
        'file',
    ];
}
