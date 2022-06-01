<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    public function index()
    {
        return view('katalog', [
            "title" => "Katalog",
            "catalogue" => Studio::all()
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
