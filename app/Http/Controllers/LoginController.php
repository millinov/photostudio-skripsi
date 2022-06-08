<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.formLogin', [
            "title" => 'login',
            "active" => 'login
            '
        ]);
    }
}
