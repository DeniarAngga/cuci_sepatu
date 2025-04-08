<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return view('user.review');
    }

    public function store(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return back()->with('warning', 'Silakan login dahulu untuk mengirim ulasan.');
        }

        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        // Simpan data review ke database
        Review::create([
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
            'nama' => $request->nama,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Review berhasil dikirim!');
    }
}
