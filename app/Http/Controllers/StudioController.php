<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    public function index()
    {
        //dd(request('search')); -> buat liat kalo ada dpt searchnya
        $studios = Studio::latest();

        return view('katalog', [
            "title" => "All Studio",
            "active" => 'studios',
            // "catalogue" => Studio::all()
            "catalogue" => $studios->get()
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
