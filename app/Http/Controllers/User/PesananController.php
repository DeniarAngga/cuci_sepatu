<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil data pesanan berdasarkan user yang sedang login
        $pesanan = Order::where('user_id', Auth::id())
            ->leftJoin('layanan', 'orders.jenis_layanan', '=', 'layanan.jenis_layanan')
            ->select('orders.*', 'layanan.harga')
            ->get();

        return view('user.pesanan', compact('pesanan'));
    }
}
