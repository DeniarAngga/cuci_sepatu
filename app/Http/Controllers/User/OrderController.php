<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index () 
    {
        return view ('user.order');
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
}
