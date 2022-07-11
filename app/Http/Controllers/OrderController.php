<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, Studio $studio)
    {
        dd($request->query->all);
    }
}
