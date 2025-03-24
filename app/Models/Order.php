<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'no_pesanan',
        'user_id',
        'nama_lengkap',
        'nomor_handphone',
        'alamat',
        'jenis_layanan',
        'jenis_sepatu',
        'tanggal_pesan',
        'status_pesanan',  // Tambahkan Status Pesanan
        'status_transaksi' // Tambahkan Status Transaksi
    ];
}
