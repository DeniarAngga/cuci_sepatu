<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba melakukan login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman utama
            return redirect('/')->with('success', 'Berhasil login!');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'Berhasil logout!');
    }
}
