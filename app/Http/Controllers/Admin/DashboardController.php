<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisSepatu;
use App\Models\Layanan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLayanan = Layanan::count();
        $totalJenisSepatu = JenisSepatu::count();

        return view('admin.dashboard', compact('totalLayanan', 'totalJenisSepatu'));
    }
}
