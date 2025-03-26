<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewPelangganController extends Controller
{
    public function index ()
    {
        $reviews = Review::latest()->paginate(10);
        return view('admin.review', compact('reviews'));
    }

    
}
