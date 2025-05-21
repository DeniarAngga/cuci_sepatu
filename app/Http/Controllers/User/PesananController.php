<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Layanan;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil pesanan terbaru yang belum dibayar
        $pesananTerbaru = Order::where('user_id', Auth::id())
            ->where('status_transaksi', 'Belum Bayar')
            ->latest()
            ->first();

        // Ambil semua pesanan untuk user
        $pesanan = Order::where('user_id', Auth::id())
            ->leftJoin('layanan', 'orders.jenis_layanan', '=', 'layanan.jenis_layanan')
            ->select('orders.*', 'layanan.jenis_layanan as nama_layanan')
            ->get();

        // Hitung total bayar
        $totalBayar = $pesanan->sum('harga');

        // Ambil metode pembayaran
        $metodePembayaran = Pembayaran::all();

        $snapToken = null;

        // Generate Snap Token jika ada pesanan terbaru
        if ($pesananTerbaru && $totalBayar > 0) {
            // Konfigurasi Midtrans
            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = true;
            Config::$is3ds = true;

            // Buat item_details dari daftar pesanan
            $itemDetails = [];

            foreach ($pesanan as $item) {
                $itemDetails[] = [
                    'id' => $item->id,
                    'price' => (int) $item->harga,
                    'quantity' => 1,
                    'name' => $item->jenis_layanan ?? 'Layanan', // fallback jika null
                ];
            }

            // Parameter untuk Midtrans Snap
            $params = [
                'transaction_details' => [
                    'order_id' => $pesananTerbaru->id,
                    'gross_amount' => (int) $totalBayar,
                ],
                'item_details' => $itemDetails,
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
            ];

            // Dapatkan Snap Token
            $snapToken = Snap::getSnapToken($params);
        }

        return view('user.pesanan', compact('pesanan', 'metodePembayaran', 'pesananTerbaru', 'totalBayar', 'snapToken'));
    }

    public function getMetodeByType(Request $request)
    {
        $metodeBayar = $request->metode_bayar;

        // Ambil data berdasarkan metode yang dipilih (Transfer Bank / E-Wallet)
        $metode = Pembayaran::where('metode_bayar', $metodeBayar)->get();

        return response()->json($metode);
    }

    public function bayar(Request $request, $id)
    {
        $request->validate([
            'no_pesanan' => 'required',
            'jenis_layanan' => 'required',
            'metode_bayar' => 'required',
            'metode_id' => 'nullable',
            'total_bayar' => 'required|string',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload bukti pembayaran
        $bukti = $request->file('bukti_pembayaran');
        $filename = 'bukti_' . time() . '_' . Str::random(5) . '.' . $bukti->getClientOriginalExtension();
        $path = $bukti->storeAs('uploads/bukti', $filename, 'public');

        $pembayaran = new Transaksi();
        $pembayaran->user_id = Auth::id();
        $pembayaran->tanggal_bayar = Carbon::now(); // ← otomatis isi tanggal saat transaksi
        $pembayaran->no_pesanan = $request->no_pesanan;
        $pembayaran->jenis_layanan = $request->jenis_layanan;
        $pembayaran->metode_bayar = $request->metode_bayar;
        $pembayaran->metode_id = $request->metode_id;
        $pembayaran->total_bayar = str_replace(['Rp', '.', ' '], '', $request->total_bayar);
        $pembayaran->bukti_pembayaran = $filename;
        $pembayaran->status_pembayaran = 'Pending';
        $pembayaran->save();

        // Update order: transaksi & pesanan
        Order::where('id', $id)->update([
            'status_transaksi' => 'Lunas',
            'status_pesanan' => 'Dibayar' // langsung ubah jadi Lunas
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil.');
    }
}
