<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.index', [
            "title" => 'Register',
            "active" => 'register'
        ]);
    }

    public function store()
    {
        return request()->all();
    }
}
