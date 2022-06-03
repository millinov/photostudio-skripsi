<?php

use App\Models\User;
use App\Models\Studio;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudioController;

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
        "title" => "Home",
        "active" => 'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Aplikasi sewa Studio Foto",
        "email" => "asdfg@gmail.com",
        "image" => "image-about.jpg"
    ]);
});

Route::get('/katalog', [StudioController::class, 'index']);
// halaman single post
Route::get('/katalog/{studio:slug}', [StudioController::class, 'show']);

// halaman kategori

Route::get('/categories', function()
{
    return view('categories',[
        'title' => 'Kategori Studio',
        'active' => "categories",
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('katalog',[
        'title' => "Category: $category->name",
        'active' => "categories",
        'catalogue'=> $category->studios->load('category','user'),
    ]);
});

Route::get('/owners/{owner:username}', function(User $owner){
    return view('katalog',[
        'title' => "Studio by $owner->name",
        'active' => "categories",
        'catalogue'=> $owner->studios->load('category','user'),
    ]);
});