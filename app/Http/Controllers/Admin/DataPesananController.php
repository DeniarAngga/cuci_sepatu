<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataPesananController extends Controller
{
    public function index()
    {
        $orders = Order::with('layanan')->latest()->paginate(10);
        return view('admin.datapesanan', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pesanan' => 'required|in:Dalam pengerjaan,Sedang dijemput,Selesai'
        ]);

        $order = Order::findOrFail($id);
        $order->status_pesanan = $request->status_pesanan;
        $order->save();

        Alert::success('Berhasil', 'Status pesanan diperbarui menjadi: ' . $request->status_pesanan);
        return back();
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        Alert::success('Dihapus', 'Pesanan berhasil dihapus.');
        return back();
    }
}
