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
            // "catalogue" => Studio::all()
            "catalogue" => Studio::with(['user','category'])->latest()->get()
        ]);
    }

    public function show(Studio $studio)
    {
        return view('studio',[
            "title" => "Studio Foto",
            "studio" => $studio
        ]);
    }
}
