<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Studio;
use App\Models\User;

class StudioController extends Controller
{
    public function index()
    {
        //dd(request('search')); -> buat liat kalo ada dpt searchnya
        $title = "";
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title =  'in ' . $category->name;
        }

        if (request('owner')) {
            $owner = User::firstWhere('username', request('owner'));
            $title =  'by ' . $owner->name;
        }

        return view('katalog', [
            "title" => "All Studio " .  $title,
            "active" => 'studios',
            // "catalogue" => Studio::all()
            "catalogue" => Studio::latest()->filter(request(['search', 'category', 'owner']))->paginate(7)
        ]);
    }

    public function show(Studio $studio)
    {
        return view('studio',[
            "title" => "Studio Foto",
            "active" => 'studios',
            "studio" => $studio
        ]);
    }
}
