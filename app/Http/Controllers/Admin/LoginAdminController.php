<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.masuk');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            // Simpan session login admin
            Session::put('admin_logged_in', true);
            Session::put('admin_username', $admin->username);

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_username');
        return redirect()->route('admin.login')->with('success', 'Anda telah logout.');
    }
}
