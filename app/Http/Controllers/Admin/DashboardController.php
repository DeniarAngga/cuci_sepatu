<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\JenisSepatu;
use App\Models\Layanan;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Review;
use App\Models\Transaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah admin sudah login
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $totalLayanan = Layanan::count();
        $totalJenisSepatu = JenisSepatu::count();
        $totalReview = Review::count();
        $totalDataPelanggan = User::count();
        $totalDataPesanan = Order::count();
        $totalDataTransaksi = Transaksi::count();
        $totalDataMetodePembayaran = Pembayaran::count();

        return view('admin.dashboard', compact('totalLayanan', 'totalJenisSepatu', 'totalReview', 'totalDataPelanggan', 'totalDataPesanan', 'totalDataTransaksi', 'totalDataMetodePembayaran'));
    }
}
