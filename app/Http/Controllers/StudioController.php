<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    public function index()
    {
        return view('katalog', [
            "title" => "All Studio",
            "active" => 'studios',
            // "catalogue" => Studio::all()
            "catalogue" => Studio::latest()->get()
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
