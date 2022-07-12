<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Order $order)
    {
        return view('review.rating', [
            "title" => "review",
            "active" => 'review',
            "order" => $order
        ]);
    }

    public function store(Request $request)
    {
        return $request;
    }
}
