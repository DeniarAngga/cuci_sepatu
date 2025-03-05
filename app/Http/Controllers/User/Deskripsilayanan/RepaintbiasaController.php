<?php

namespace App\Http\Controllers\User\Deskripsilayanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RepaintbiasaController extends Controller
{
    public function index () 
    {
        return view ('user.deskripsilayanan.repaintbiasa');
    }
}
