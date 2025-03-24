<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('user.order', compact('layanans'));
    }

    public function store(Request $request)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->back()->with('warning', 'Silahkan login atau registrasi terlebih dahulu untuk melakukan pemesanan.');
        }

        // Validasi data input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nomor_handphone' => 'required|string|max:15',
            'alamat' => 'required|string',
            'jenis_layanan' => 'required|string',
            'jenis_sepatu' => 'required|string',
            'tanggal_pesan' => 'required|date',
        ]);

        // Buat nomor pesanan unik
        $no_pesanan = 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 8));

        // Simpan data ke dalam tabel orders dengan status awal
        Order::create([
            'no_pesanan' => $no_pesanan,
            'user_id' => Auth::id(),
            'nama_lengkap' => $validated['nama_lengkap'],
            'nomor_handphone' => $validated['nomor_handphone'],
            'alamat' => $validated['alamat'],
            'jenis_layanan' => $validated['jenis_layanan'],
            'jenis_sepatu' => $validated['jenis_sepatu'],
            'tanggal_pesan' => $validated['tanggal_pesan'],
            'status_pesanan' => 'Menunggu Pembayaran', // Status awal pesanan
            'status_transaksi' => 'Belum Bayar', // Status awal transaksi
        ]);

        return redirect()->route('user.order')->with('success', "Pesanan berhasil dibuat! Silakan lakukan pembayaran.");
    }

    public function updatePaymentStatus($orderId)
    {
        // Cari pesanan berdasarkan ID
        $order = Order::findOrFail($orderId);

        // Update status setelah pembayaran dilakukan
        $order->update([
            'status_pesanan' => 'Sedang Dikerjakan', // Status berubah setelah pembayaran
            'status_transaksi' => 'Lunas', // Transaksi sudah dibayar
        ]);

        return redirect()->route('user.order')->with('success', "Pembayaran berhasil! Pesanan sedang diproses.");
    }

    public function create(Request $request)
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Ambil parameter dari URL
        $jenisLayanan = $request->get('jenis_layanan');
        $source = $request->get('source');

        // Tentukan apakah input readonly berdasarkan source dan jenis layanan
        $readonly = ($source === 'pesan' && $jenisLayanan) ? true : false;

        return view('user.order', [
            'user' => $user,
            'jenisLayanan' => $jenisLayanan,
            'readonly' => $readonly
        ]);
    }
}
