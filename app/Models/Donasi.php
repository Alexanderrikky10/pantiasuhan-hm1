<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donasi extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'no_telpon',
        'snap_token',
        'status',
        'jumlah',
    ];

}
