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
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->back()->with('warning', 'Silahkan login terlebih dahulu untuk melakukan pemesanan.');
        }

        // Validasi input (waktu jadi optional/null)
        $validated = $request->validate([
            'alamat' => 'required|string',
            'tanggal_pesan' => 'required|date',
            // 'waktu' => 'nullable|string',
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'nomor_handphone' => 'required|string',
            'jenis_layanan' => 'required|string',
            'jumlah_item' => 'required|string',
            'jenis_sepatu' => 'required|string',
        ]);

        // Ambil harga dari layanan
        $layananUtama = Layanan::where('jenis_layanan', '!=', 'PICKUP SERVICES')
            ->whereRaw("CONCAT(jenis_layanan, ' - Rp', FORMAT(harga, 0, 'id_ID')) = ?", [$validated['jenis_layanan']])
            ->first();

        // Atau jika value hanya nama (bukan gabungan dengan harga), pakai:
        // $layananUtama = Layanan::where('jenis_layanan', $validated['jenis_layanan'])->first();

        // Ambil harga pickup (jika ada)
        $pickup = Layanan::where('jenis_layanan', 'PICKUP SERVICES')->first();
        $pickupHarga = $pickup ? $pickup->harga : 0;

        $hargaLayanan = $layananUtama ? $layananUtama->harga : 0;

        // Kalkulasi total harga
        $totalHarga = $hargaLayanan + $pickupHarga;

        // Buat nomor pesanan unik
        $no_pesanan = 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 8));

        // Simpan pesanan
        Pickup::create([
            'no_pesanan' => $no_pesanan,
            'user_id' => Auth::id(),
            'alamat' => $validated['alamat'],
            'tanggal_pesan' => $validated['tanggal_pesan'],
            // 'waktu' => $validated['waktu'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'nomor_handphone' => $validated['nomor_handphone'],
            'jenis_layanan' => $validated['jenis_layanan'],
            'jumlah_item' => $validated['jumlah_item'],
            'jenis_sepatu' => $validated['jenis_sepatu'],
            'harga' => $totalHarga,
            'status_pesanan' => 'Menunggu Pembayaran',
            'status_transaksi' => 'Belum Bayar',
        ]);

        return redirect()->back()->with('success', 'Pemesanan pickup berhasil dikirim!');
    }
}
