<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSepatu extends Model
{
    use HasFactory;

    protected $table = 'jenis_sepatu';

    protected $fillable = [
        'jenis_sepatu'
    ];
}
