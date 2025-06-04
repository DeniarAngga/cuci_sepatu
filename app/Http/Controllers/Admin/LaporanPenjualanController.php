<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Pagination\LengthAwarePaginator;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $orders = new LengthAwarePaginator([], 0, 10); // default: kosong tapi tetap bisa paginate

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $orders = Pickup::whereBetween('tanggal_pesan', [
                $request->tanggal_mulai,
                $request->tanggal_selesai
            ])
                ->latest()
                ->paginate(10)
                ->appends($request->all()); // mempertahankan query string
        }

        return view('admin.laporan_penjualan', compact('orders'));
    }

    public function cetakPDF(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        // Ambil data berdasarkan filter tanggal
        $orders = Pickup::whereBetween('tanggal_pesan', [
            $request->tanggal_mulai,
            $request->tanggal_selesai
        ])->orderBy('tanggal_pesan', 'desc')->get();

        // Cek apakah ada order dengan status "Belum bayar"
        $adaBelumBayar = $orders->contains(fn($order) => $order->status_transaksi === 'Belum bayar');

        if ($adaBelumBayar) {
            return response()->json([
                'error' => true,
                'message' => 'Tidak bisa cetak PDF karena masih ada pesanan dengan status "Belum bayar".'
            ], 422);
        }

        // Buat PDF
        $pdf = Pdf::loadView('admin.laporanpenjualan_pdf', compact('orders'));

        // Tampilkan di browser (iframe)
        return $pdf->stream('laporan_penjualan.pdf');
    }
}
