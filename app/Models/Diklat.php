<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    use HasFactory;

    protected $table = 'diklat';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'file',
        'link',
    ];
}


