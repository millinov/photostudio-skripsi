<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
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

Route::get('/rating', function () {
    return view('review.rating', [
        "title" => "rating",
        "active" => 'rating',
    ]);
});

Route::get('/wishlist', function () {
    return view('wishlist', [
        "title" => "wishlist",
        "active" => 'wishlist',
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
Route::get('/dashboard/wishlist', [FavoriteController::class, 'index'])->middleware('auth');

Route::post('/change-pic', [UserController::class, 'changeProfPic'])->middleware('auth');


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
Route::post('/transaction/{order:id}', [TransactionController::class, 'store'])->middleware('seller');
Route::get('/receipt/fp/{transaction:id}', [TransactionController::class, 'fpDownload'])->middleware('auth');
Route::get('/receipt/dp/{transaction:id}', [TransactionController::class, 'dpDownload'])->middleware('auth');
Route::get('/receipt/iv/{transaction:id}', [TransactionController::class, 'ivDownload'])->middleware('auth');

//review
Route::get('/review/{order:id}', [ReviewController::class, 'create'])->middleware('auth');
Route::post('/review/create/{order:id}', [ReviewController::class, 'store'])->middleware('auth');

//favorite
Route::post('/favorite/create', [FavoriteController::class, 'store'])->middleware('auth');
Route::delete('/delete/{favorite:id}', [FavoriteController::class, 'delete'])->middleware('auth');

