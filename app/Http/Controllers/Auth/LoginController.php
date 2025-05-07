<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    // Proses data login
    public function login(Request $request)
    {
        // Validasi data input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Lakukan autentikasi terlebih dahulu
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Cek jika email belum diverifikasi
            if (is_null($user->email_verified_at)) {
                Auth::logout(); // Langsung logout
                return back()->withErrors([
                    'email' => 'Silakan verifikasi email Anda terlebih dahulu sebelum login.',
                ])->withInput();
            }

            // Jika email sudah terverifikasi
            return redirect()->intended('/')->with('success', 'Berhasil login!');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }


    // Logout pengguna
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
