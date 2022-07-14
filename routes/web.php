<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

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


Route::post('/become-a-seller/{user:username}', [UserController::class, 'becomeSeller']);

//email verification
Auth::routes(['verify' => true]);
Route::get('/home','HomeController@index')->name('home')->middleware('verified');

//dashboard user
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard/history', [OrderController::class, 'history'])->middleware('auth');
Route::get('/dashboard/wishlist', [FavoriteController::class, 'index'])->middleware('auth');


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
