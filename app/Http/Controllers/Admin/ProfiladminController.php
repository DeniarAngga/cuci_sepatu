<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfiladminController extends Controller
{
    public function index()
    {
        return view('admin.profiladmin');
    }

    public function updateProfile(Request $request)
    {
        if (!Session::has('admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $sessionAdmin = Session::get('admin');

        // Ambil admin dari database berdasarkan username
        $admin = Admin::where('username', $sessionAdmin->username)->first();

        if (!$admin) {
            return redirect()->route('admin.login')->with('error', 'Data admin tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update nama
        $admin->name = $request->name;

        // Upload foto baru jika ada
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/admin'), $photoName);

            // Hapus foto lama jika ada dan bukan foto default
            if ($admin->photo && $admin->photo !== 'FOTO.jpg' && file_exists(public_path('uploads/admin/' . $admin->photo))) {
                unlink(public_path('uploads/admin/' . $admin->photo));
            }

            $admin->photo = $photoName;
        }

        // Update password jika diisi
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $admin->save();

        // Perbarui data admin di session
        Session::put('admin', $admin);

        return redirect()->route('admin.profiladmin')->with('success', 'Profil berhasil diperbarui.');
    }
}
