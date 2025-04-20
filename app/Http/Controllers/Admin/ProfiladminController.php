<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfiladminController extends Controller
{
    public function index()
    {
        // Ambil data admin berdasarkan yang sedang login
        $admin = Admin::find(Auth::id());

        return view('admin.profiladmin', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|confirmed|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = Admin::find(Auth::id());

        // Update nama
        $admin->name = $request->input('name');

        // Update password jika diisi
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->input('password'));
        }

        // Update photo jika diupload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($admin->photo && file_exists(public_path('uploads/admin/' . $admin->photo))) {
                unlink(public_path('uploads/admin/' . $admin->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin'), $filename);

            $admin->photo = $filename;
        }

        $admin->save();

        return redirect()->route('admin.profiladmin')->with('success', 'Profil berhasil diperbarui');
    }
}
