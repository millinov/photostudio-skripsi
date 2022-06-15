<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardStudioController;

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

// untuk login dan logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// untuk register
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->middleware('auth');
Route::resource('/dashboard/studio', DashboardStudioController::class)->middleware('auth');
