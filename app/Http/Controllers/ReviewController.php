<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use App\Models\Studio;
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

    public function store(Request $request, Order $order)
    {
        $ratingCount = Review::where('studio_id', $order->studio->id)->count();

        if ($ratingCount > 0) 
        {
            $rateSum = Review::where('studio_id', $order->studio->id)->sum('rating');
            
            $rateSum += $request->rating;
            $ratingFinal = $rateSum / $ratingCount;
        } 
        else 
        {
            $ratingFinal = $request->rating;
        }

        Studio::where('id', $order->studio->id)->update(['total_rating' => $ratingFinal]);

        $validatedData = $request->validate([
            'review_text' => 'max:255',
            'rating' => 'required|max:5'
        ]);

        Review::create($validatedData);

        return redirect('/katalog'. '/'. $order->studio->slug)->with('success', 'Order has been created');;
        
    }
}
