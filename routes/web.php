<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

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

Route::get('/katalog', [StudioController::class, 'browseIndex']);
Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => 'home',
    ]);
})->name('home');

// Route::get('/about', function () {
//     return view('about', [
//         "title" => "About",
//         "active" => 'about',
//         "name" => "Aplikasi sewa Studio Foto",
//         "email" => "asdfg@gmail.com",
//         "image" => "image-about.jpg"

Route::get('/transaction', function () {
    return view('transaction', [
        "title" => "transaction",
        "active" => 'transaction',
    ]);
});




Route::get('/katalog', [StudioController::class, 'katalog']);

// halaman single post
Route::get('/katalog/{studio:slug}', [StudioController::class, 'showPage']);

// halaman kategori
Route::get('/categories', [CategoryController::class, 'show']);

// untuk login dan logout
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);
// untuk register
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);

Route::post('/become-a-seller/{user:username}', [UserController::class, 'becomeSeller']);

//dashboard user
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard/history', [OrderController::class, 'history'])->middleware('auth');

//seller
Route::resource('/dashboard/studio', StudioController::class)->name('show','studio')->middleware('seller');
Route::get('/dashboard/checkSlug', [StudioController::class, 'createSlug']);

// admin
Route::get('/dashboard/categories', [UserController::class, 'adminCategories'])->middleware('admin');
Route::post('/dashboard/categories', [CategoryController::class, 'store']);
Route::get('/dashboard/categories/checkSlug', [CategoryController::class, 'createSlug']);

Route::get('/dashboard/users', [UserController::class, 'adminUsers'])->middleware('admin');

//order
Route::post('/order/{studio:slug}', [OrderController::class, 'store'])->middleware('auth');
Route::get('/order/{order:id}', [OrderController::class, 'show'])->middleware('seller');
Route::post('/order/update/{order:id}', [OrderController::class, 'update'])->middleware('auth');

//transaction
Route::post('/transaction/{user:username}', [TransactionController::class, 'store'])->middleware('seller');
