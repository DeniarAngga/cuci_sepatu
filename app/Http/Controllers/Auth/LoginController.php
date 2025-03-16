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

        // Coba melakukan login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil login, arahkan ke dashboard
            return redirect()->intended('/')->with('success', 'Berhasil login!');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
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
