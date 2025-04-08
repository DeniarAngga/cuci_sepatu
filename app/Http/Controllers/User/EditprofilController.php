<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditprofilController extends Controller
{
    public function index()
    {
        return view('user.editprofil');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update nama
        $user->name = $request->name;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Flash message dan redirect
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
