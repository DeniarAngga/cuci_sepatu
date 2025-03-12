<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Layanan;
use RealRashid\SweetAlert\Facades\Alert;

class DataPaketController extends Controller
{
    public function index()
    {
        $layanan = Layanan::paginate(10);
        return view('admin.datapaket', compact('layanan'));
    }

    public function tambah(Request $request)
    {
        // Validasi data input
        $request->validate([
            'jenis_layanan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $layanan = new Layanan();
        $layanan->jenis_layanan = $request->jenis_layanan;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->harga = $request->harga;

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/layanan'), $filename);
            $layanan->gambar = $filename;
        }

        $layanan->save();

        Alert::success('Success', 'Layanan berhasil ditambahkan!', '1500');
        return redirect()->route('admin.datapaket');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_layanan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $layanan = Layanan::findOrFail($id);

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            $oldImagePath = public_path('uploads/layanan/' . $layanan->gambar);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/layanan'), $filename);
            $layanan->gambar = $filename;
        }

        // Update data lainnya
        $layanan->jenis_layanan = $request->jenis_layanan;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->harga = $request->harga;
        $layanan->save();

        Alert::success('Success', 'Layanan berhasil diperbarui!', '1500');
        return redirect()->route('admin.datapaket');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        Alert::success('Success', 'Layanan berhasil dihapus!');
        return redirect()->route('admin.datapaket');
    }
}
