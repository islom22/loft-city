<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\WebController;
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
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::post('upload-image', [HomeController::class, 'uploadImage'])->name('upload-image');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('files', FileController::class);
    // Route::resource('applications', ApplicationController::class);
    Route::resource('langs', LangController::class);
    Route::post('/translations/search', [TranslationController::class, 'search'])->name('translation.search');
    Route::resource('translations', TranslationController::class);
});


// Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'locale'], function(){
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/products', [WebController::class, 'products'])->name('products');
    Route::get('/about', [WebController::class, 'about_company'])->name('about_company');
    Route::get('/products/{id}', [WebController::class, 'inner_page'])->name('inner_page');
    Route::get('/reservations', [WebController::class, 'reservation_page'])->name('reservation_page');
    Route::get('/categories/{category_id}', [WebController::class, 'categories_show'])->name('categories_show');
// });    

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
