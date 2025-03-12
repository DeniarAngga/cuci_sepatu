<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('user.order', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
            'package' => 'required|string',
            'shoe_type' => 'required|string',
            'order_date' => 'required|date',
        ]);

        Order::create([
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'package' => $request->package,
            'shoe_type' => $request->shoe_type,
            'order_date' => $request->order_date,
        ]);

        return redirect()->route('user.order')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function create(Request $request)
    {
        $jenisLayanan = $request->get('jenis_layanan');
        $source = $request->get('source'); // Ambil parameter source dari URL

        // Jika source dari 'pesan' dan ada jenis layanan, maka readonly
        $readonly = ($source === 'pesan' && $jenisLayanan) ? true : false;

        return view('user.order', [
            'jenisLayanan' => $jenisLayanan,
            'readonly' => $readonly
        ]);
    }
}
