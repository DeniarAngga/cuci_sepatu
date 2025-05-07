<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerifikasiEmailController extends Controller
{
    /**
     * Menampilkan halaman verifikasi email.
     */
    public function showVerifyPage(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        return view('auth.verify-email', compact('user'));
    }

    /**
     * Verifikasi email pengguna.
     */
    public function verify(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        if ($user->email_verified_at) {
            return redirect()->route('login')->with('success', 'Email sudah terverifikasi.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('login')->with('success', 'Email berhasil diverifikasi! Silakan login.');
    }
}
