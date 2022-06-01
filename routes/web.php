<?php

use App\Models\Studio;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Aplikasi sewa Studio Foto",
        "email" => "asdfg@gmail.com",
        "image" => "image-about.jpg"
    ]);
});

Route::get('/katalog', function () {

    return view('katalog', [
        "title" => "Katalog",
        "catalogue" => Studio::all()
    ]);
});

// halaman single post
Route::get('katalog/{slug}', function($slug) {

    return view('studio',[
        "title" => "Studio Foto",
        "studio" => Studio::find($slug)
    ]);
});