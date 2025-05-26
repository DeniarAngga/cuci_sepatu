<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $table = 'pickup';

    protected $fillable = [
        'no_pesanan',
        'user_id',
        'alamat',
        'tanggal_pesan',
        'nama_lengkap',
        'email',
        'nomor_handphone',
        'jenis_layanan',
        'jumlah_item',
        'jenis_sepatu',
        'harga',
        'status_pesanan',  // Tambahkan Status Pesanan
        'status_transaksi' // Tambahkan Status Transaksi
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'jenis_layanan', 'jenis_layanan');
    }
}
