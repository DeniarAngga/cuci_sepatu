<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index () 
    {
        return view ('user.pesanan');
    }
}
