<?php

namespace App\Http\Controllers\User\Deskripsilayanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PickupservicesController extends Controller
{
    public function index () 
    {
        return view ('user.deskripsilayanan.pickupservices');
    }
}
