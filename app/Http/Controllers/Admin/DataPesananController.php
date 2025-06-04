<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Pickup;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataPesananController extends Controller
{
    public function index()
    {
        $orders = Pickup::with('layanan')->latest()->paginate(10);
        return view('admin.datapesanan', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pesanan' => 'required|in:Dikonfirmasi & Sedang Atur Penjemputan,Sedang dijemput,Dalam Pengerjaan,Selesai'
        ]);

        $order = Pickup::findOrFail($id);
        $order->status_pesanan = $request->status_pesanan;
        $order->save();

        Alert::success('Berhasil', 'Status pesanan diperbarui menjadi: ' . $request->status_pesanan);
        return back();
    }

    public function delete($id)
    {
        $order = Pickup::findOrFail($id);
        $order->delete();

        Alert::success('Dihapus', 'Pesanan berhasil dihapus.');
        return back();
    }
}
