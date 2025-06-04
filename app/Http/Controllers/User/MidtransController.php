<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pickup;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handleCallback(Request $request)
    {
        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $notif = new Notification();

        $transactionStatus = $notif->transaction_status;
        $orderId = $notif->order_id;

        // Pastikan order_id valid
        $realOrderId = explode('-', $orderId)[0]; // misalnya "ORDER-5-xxxx" → ambil 5

        $order = Order::find($realOrderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update status berdasarkan transaksi
        if ($transactionStatus === 'settlement' || $transactionStatus === 'capture') {
            $order->status_transaksi = 'Lunas';
            $order->status_pesanan = 'Lunas';
            $order->save();
        }

        return response()->json(['message' => 'Notification handled'], 200);
    }

    public function manualCallback(Request $request)
    {
        $orderId = $request->order_id;
        $status = $request->transaction_status;

        $pesanan = Pickup::where('midtrans_order_id', $orderId)->first();

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan.'
            ]);
        }

        if ($status === 'settlement') {
            $pesanan->update([
                'status_transaksi' => 'Lunas',
                'status_pesanan' => 'Menunggu Konfirmasi',
            ]);

            return response()->json(['success' => true]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Transaksi belum settlement.'
        ]);
    }
}
