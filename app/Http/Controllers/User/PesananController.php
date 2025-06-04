<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Layanan;
use App\Models\Pembayaran;
use App\Models\Pickup;
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
        // Ambil pickup model asli
        $pesanan = Pickup::where('user_id', Auth::id())->get();

        $metodePembayaran = Pembayaran::all();

        // Midtrans config
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $snapTokens = [];

        foreach ($pesanan as $item) {
            if ($item->status_transaksi === 'Belum Bayar') {
                if (!$item->midtrans_order_id) {
                    $orderId = 'pickup-' . $item->id . '-' . time() . '-' . Str::random(5);
                    $item->midtrans_order_id = $orderId;
                    $item->save(); // ← penting! simpan perubahan
                } else {
                    $orderId = $item->midtrans_order_id;
                }

                $params = [
                    'transaction_details' => [
                        'order_id' => $orderId,
                        'gross_amount' => (int) $item->total,
                    ],
                    'item_details' => [[
                        'id' => $item->id,
                        'price' => (int) $item->total,
                        'quantity' => 1,
                        'name' => $item->jenis_layanan ?? 'Layanan',
                    ]],
                    'customer_details' => [
                        'first_name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                    ],
                    'callbacks' => [
                        'finish' => route('user.pesanan'),
                        'unfinish' => route('user.pesanan'),
                        'error' => route('user.pesanan'),
                    ],
                ];

                $snapTokens[$orderId] = Snap::getSnapToken($params);
            }
        }

        return view('user.pesanan', compact('pesanan', 'metodePembayaran', 'snapTokens'));
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
