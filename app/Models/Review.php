<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $fillable = [
        'user_id',
        'nama', // Menyimpan nama pengguna
        'rating',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
