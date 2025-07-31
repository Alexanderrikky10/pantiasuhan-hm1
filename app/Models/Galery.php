<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    //
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'status',
    ];
}
