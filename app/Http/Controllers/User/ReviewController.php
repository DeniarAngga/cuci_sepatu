<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index () 
    {
        return view ('user.review');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'order_id' => $request->order_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Review berhasil dikirim!');
    }

}
