<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $orders = new LengthAwarePaginator([], 0, 10); // default: kosong tapi tetap bisa paginate

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $orders = Order::whereBetween('tanggal_pesan', [
                $request->tanggal_mulai,
                $request->tanggal_selesai
            ])
                ->latest()
                ->paginate(10)
                ->appends($request->all()); // mempertahankan query string
        }

        return view('admin.laporanpenjualan', compact('orders'));
    }

    public function cetakPDF(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        // Ambil data berdasarkan filter tanggal
        $orders = Order::whereBetween('tanggal_pesan', [
            $request->tanggal_mulai,
            $request->tanggal_selesai
        ])->orderBy('tanggal_pesan', 'desc')->get();

        // Buat PDF
        $pdf = Pdf::loadView('admin.laporanpenjualan_pdf', compact('orders'));

        // Tampilkan di browser (iframe)
        return $pdf->stream('laporan_penjualan.pdf');
    }
}
