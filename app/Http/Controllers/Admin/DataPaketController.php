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
        $layanan = Layanan::all();
        return view('admin.datapaket', compact('layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_layanan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_layanan', 'public');
        }

        Layanan::create([
            'jenis_layanan' => $request->jenis_layanan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $gambarPath
        ]);

        Alert::success('Sukses', 'Layanan berhasil ditambahkan!');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_layanan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $layanan = Layanan::findOrFail($id);

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            $gambarPath = $request->file('gambar')->store('gambar_layanan', 'public');
            $layanan->gambar = $gambarPath;
        }

        $layanan->jenis_layanan = $request->jenis_layanan;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->harga = $request->harga;
        $layanan->save();

        Alert::success('Sukses', 'Layanan berhasil diperbarui!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }

        $layanan->delete();

        Alert::success('Dihapus', 'Layanan berhasil dihapus!');
        return redirect()->back();
    }
}
