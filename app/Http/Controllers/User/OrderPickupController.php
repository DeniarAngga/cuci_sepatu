<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JenisSepatu;
use App\Models\Layanan;
use App\Models\Order;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderPickupController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        $jenisSepatu = JenisSepatu::all(); // ambil semua data jenis sepatu

        return view('user.Orderpickup', compact('layanans', 'jenisSepatu'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('warning', 'Silakan login terlebih dahulu.');
        }

        $validated = $request->validate([
            'alamat' => 'required|string',
            'tanggal_pesan' => 'required|date',
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'nomor_handphone' => 'required|string',
            'jenis_layanan' => 'required|string',
            'jumlah_item' => 'required|string',
            'jenis_sepatu' => 'required|string',
            'subtotal_pesanan' => 'required|integer',
            'subtotal_pengiriman' => 'required|integer',
            'biaya_layanan' => 'required|integer',
            'total_harga' => 'required|integer',
        ]);

        $no_pesanan = 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 8));

        Pickup::create([
            'no_pesanan' => $no_pesanan,
            'user_id' => Auth::id(),
            'alamat' => $validated['alamat'],
            'tanggal_pesan' => $validated['tanggal_pesan'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'nomor_handphone' => $validated['nomor_handphone'],
            'jenis_layanan' => $validated['jenis_layanan'],
            'jumlah_item' => $validated['jumlah_item'],
            'jenis_sepatu' => $validated['jenis_sepatu'],
            'subtotal_pesanan' => $validated['subtotal_pesanan'],
            'subtotal_pengiriman' => $validated['subtotal_pengiriman'],
            'biaya_layanan' => $validated['biaya_layanan'],
            'total' => $validated['total_harga'],
            'status_pesanan' => 'Menunggu Pembayaran',
            'status_transaksi' => 'Belum Bayar',
        ]);

        return redirect()->back()->with('success', 'Pemesanan pickup berhasil dikirim!');
    }
}
