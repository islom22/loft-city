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
    Route::post('upload-product-image', [ProductController::class, 'uploadImage'])->name('upload-product-image');
    Route::post('/delete-image', [HomeController::class, 'deleteImage'])->name('delete-image');
    Route::post('/delete-image-category', [HomeController::class, 'delete_image_category'])->name('delete-image-category');
    Route::post('upload-category-image', [CategoryController::class, 'upload_category_image'])->name('upload-category-image');
    Route::post('/delete-image-about', [HomeController::class, 'delete_image_about'])->name('delete-image-about');
    Route::post('/delete-image-about_2', [HomeController::class, 'delete_image_about_2'])->name('delete-image-about_2');
    Route::post('/delete-image-about_3', [HomeController::class, 'delete_image_about_3'])->name('delete-image-about_3');
    Route::post('upload-about-image_1', [AboutController::class, 'upload_about_image_1'])->name('upload-about-image_1');
    Route::post('upload-about-image_2', [AboutController::class, 'upload_about_image_2'])->name('upload-about-image_2');
    Route::post('upload-about-image_3', [AboutController::class, 'upload_about_image_3'])->name('upload-about-image_3');
    Route::post('/delete-video-about', [HomeController::class, 'delete_video_about'])->name('delete-video-about');
    Route::post('upload-about-video', [AboutController::class, 'upload_about_video'])->name('upload-about-video');
    // Route::post('/delete-file', [HomeController::class, 'delete_file'])->name('delete-file');
    // Route::post('upload-file', [FileController::class, 'upload_file'])->name('upload-file');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('files', FileController::class);
    // Route::resource('applications', ApplicationController::class);
    Route::resource('langs', LangController::class);
    Route::post('/dastavka', [WebController::class, 'dastavka'])->name('dastavka');
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
    Route::get('/order', [WebController::class, 'order'])->name('order');
    Route::post('/session_delete', [WebController::class, 'from_basket'])->name('from_basket');

    Route::get('/karzinka', [WebController::class, 'to_basket'])->name('to_basket');
// });    

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
