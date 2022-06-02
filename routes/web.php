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

Route::get('/katalog', [StudioController::class, 'index']);
// halaman single post
Route::get('/katalog/{studio:slug}', [StudioController::class, 'show']);

// halaman kategori

Route::get('/categories', function()
{
    return view('categories',[
        'title' => 'Kategori Studio',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('katalog',[
        'title' => $category->name,
        'catalogue'=> $category->studios,
        'category' => $category->name
    ]);
});

Route::get('/owners/{owner:username}', function(User $owner){
    return view('katalog',[
        'title' => $owner->name,
        'catalogue'=> $owner->studios,
    ]);
});