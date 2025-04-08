<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DataPesananController extends Controller
{
    public function index()
    {
        $orders = Order::with('layanan')->latest()->paginate(10);
        return view('admin.datapesanan', compact('orders'));
    }
}
