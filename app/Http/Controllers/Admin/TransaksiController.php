<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('metodePembayaran')->get();
        return view('admin.transaksi', compact('transaksi'));
    }

    public function approve($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status_pembayaran = 'Lunas';
        $transaksi->save();

        Alert::success('Success', 'Pembayaran telah disetujui.', '1500');
        return redirect()->route('admin.transaksi');
    }

    public function delete($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Hapus bukti pembayaran dari storage jika ada
        if ($transaksi->bukti_pembayaran) {
            Storage::delete('public/uploads/bukti/' . $transaksi->bukti_pembayaran);
        }

        // Hapus transaksi
        $transaksi->delete();

        Alert::success('Success', 'Transaksi berhasil dihapus', '1500');
        return redirect()->route('admin.transaksi');
    }
}
