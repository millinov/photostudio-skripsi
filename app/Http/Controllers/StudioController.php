<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        return view('katalog', [
            "title" => "Katalog",
            "catalogue" => \App\Models\Studio::all()
        ]);
    }

    public function show($slug)
    {
        return view('studio',[
            "title" => "Studio Foto",
            "studio" => \App\Models\Studio::find($slug)
        ]);
    }
}
