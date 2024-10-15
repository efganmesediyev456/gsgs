<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Site\HomeController;
use \App\Http\Controllers\Site\BlogController;
use \App\Http\Controllers\Site\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{language?}', [HomeController::class, 'home'])->name('site.home');
Route::get('/{language?}/about', [HomeController::class, 'about'])->name('site.about');
Route::match(['GET','POST'],'/{language?}/contact', [HomeController::class, 'contact'])->name('site.contact');
Route::get('/{language?}/blogs/{blog}', [BlogController::class, 'blog'])->name('site.blogs.single');
Route::get('/{language?}/blogs', [BlogController::class, 'index'])->name('site.blogs.index');
Route::get('/{language?}/products', [ProductController::class, 'index'])->name('site.products.index');
Route::get('/{language?}/category/{category}', [ProductController::class, 'category'])->name('site.products.category');
Route::get('/{language?}/products/{product}', [ProductController::class, 'single'])->name('site.products.single');
Route::get('/products/filter', [ProductController::class, 'filter'])->name('site.products.filter');
Route::get('/{language?}/search', [ProductController::class, 'search'])->name('site.products.search');
Route::post('/{language?}/apply/site', [HomeController::class, 'applySite'])->name('site.apply');
