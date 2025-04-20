<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::paginate(10);
        return view('admin.metodepembayaran', compact('pembayaran'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'jenis_bayar' => 'required|string|max:10',
            'metode_bayar' => 'required|string|max:50',
            'nomor_rekening' => 'required|string|regex:/^[0-9]{1,15}$/',
        ]);

        Pembayaran::create([
            'name' => $request->name,
            'jenis_bayar' => $request->jenis_bayar,
            'metode_bayar' => $request->metode_bayar,
            'nomor_rekening' => $request->nomor_rekening,
        ]);

        Alert::success('Success', 'Metode Pembayaran berhasil ditambahkan!', '1500');
        return redirect()->route('admin.metodepembayaran');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'jenis_bayar' => 'required|string|max:10',
            'metode_bayar' => 'required|string|max:10',
            'nomor_rekening' => 'required|string|regex:/^[0-9]{1,15}$/',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        // Update data lainnya
        $pembayaran->name = $request->name;
        $pembayaran->jenis_bayar = $request->jenis_bayar;
        $pembayaran->metode_bayar = $request->metode_bayar;
        $pembayaran->nomor_rekening = $request->nomor_rekening;
        $pembayaran->save();

        Alert::success('Success', 'Metode Pembayaran berhasil diperbarui!', '1500');
        return redirect()->route('admin.metodepembayaran');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        Alert::success('Success', 'Metode Pembayaran berhasil dihapus!');
        return redirect()->route('admin.metodepembayaran');
    }
}
