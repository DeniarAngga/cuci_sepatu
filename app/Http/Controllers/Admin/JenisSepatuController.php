<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisSepatu;
use RealRashid\SweetAlert\Facades\Alert;

class JenisSepatuController extends Controller
{
    // Tampilkan data
    public function index()
    {
        $jenis_sepatu = JenisSepatu::paginate(10);
        return view('admin.jenissepatu', compact('jenis_sepatu'));
    }

    // Simpan data baru
    public function tambah(Request $request)
    {
        // Validasi data input
        $request->validate([
            'jenis_sepatu' => 'required|string|max:100',
        ]);

        // Simpan data ke database
        JenisSepatu::create([
            'jenis_sepatu' => $request->jenis_sepatu,
        ]);

        Alert::success('Success', 'Jenis Sepatu berhasil ditambahkan!', '1500');
        return redirect()->route('admin.jenissepatu');
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_sepatu' => 'required|string|max:100',
        ]);

        $jenissepatu = JenisSepatu::findOrFail($id);

        // Update data lainnya
        $jenissepatu->jenis_sepatu = $request->jenis_sepatu;
        $jenissepatu->save();

        Alert::success('Success', 'Jenis Sepatu berhasil diperbarui!', '1500');
        return redirect()->route('admin.datapaket');
    }

    // Hapus data
    public function destroy($id)
    {
        $jenissepatu = JenisSepatu::findOrFail($id);
        $jenissepatu->delete();

        Alert::success('Success', 'Jenis Sepatu berhasil dihapus!');
        return redirect()->route('admin.jenissepatu');
    }
}
