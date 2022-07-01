<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/katalog', [StudioController::class, 'browseIndex']);
// halaman single post
Route::get('/katalog/{studio:slug}', [StudioController::class, 'showPage']);
Route::resource('/dashboard/studio', StudioController::class)->name('show','studio')->middleware('auth');
Route::get('/dashboard/checkSlug', [StudioController::class, 'createSlug']);

// halaman kategori
Route::get('/categories', [CategoryController::class, 'show']);

// untuk login dan logout
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);
// untuk register
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');