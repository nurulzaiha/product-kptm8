<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products',[App\Http\Controllers\ProductController::class,'index'])->name('product:list');

Route::get('/users',[App\Http\Controllers\UserController::class,'index']) -> middleware('auth');

Route::get('/products/create',[App\Http\Controllers\ProductController::class,'create'])->name('product:create');
Route::post('/products/create',[App\Http\Controllers\ProductController::class,'store']);

Route::get('/products/{id}',[App\Http\Controllers\ProductController::class,'show'])->name('products:show');

Route::get('/products/{id}/edit',[App\Http\Controllers\ProductController::class,'edit'])->name('products:edit');
Route::post('/products/{id}/edit',[App\Http\Controllers\ProductController::class,'update'])->name('products:update');

Route::get('/products/{product}/delete',[App\Http\Controllers\ProductController::class,'delete'])->name('products:delete');