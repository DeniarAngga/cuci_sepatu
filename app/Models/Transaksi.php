<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'tanggal_bayar',
        'no_pesanan',
        'jenis_layanan',
        'metode_bayar',
        'metode_id',
        'total_bayar',
        'bukti_pembayaran',
        'status_pembayaran',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'metode_id');
    }
}
