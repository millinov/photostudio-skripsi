<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Studio;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return view('dashboard.wishlist.index', [
            "title" => "Wishlist",
            "active" => 'studios',
            "favorites" => auth()->user()->favorites,
        ]);
    }

    public function store(Request $request)
    {
        $studio = Studio::where('id', $request->studio_id)->first();

        $data['studio_id'] = $studio->id;
        $data['user_id'] = auth()->user()->id;

        Favorite::create($data);

        return redirect('/katalog'. '/'. $studio->slug)->with('success', 'Studio has been added to your wishlist');
    }

    public function delete(Favorite $favorite)
    {  
        $studioSlug = $favorite->studio->slug;
        $favorite->delete();
        return redirect('/katalog'. '/'. $studioSlug)->with('success', 'Studio has been removed from your wishlist');
    }
}
