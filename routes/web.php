<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\ProductController;
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


Route::get('/',[CatController::class,'index'])->name('dashboard');

Route::get('/addcat',[CatController::class, 'create'])->middleware(['auth'])->name('addcat');
Route::post('/addcat',[CatController::class, 'save'])->middleware(['auth']);
Route::get('/showcat',[CatController::class, 'dashboard'])->middleware(['auth'])->name('category.list');
Route::get('/dashboard',[CatController::class, 'dashboard'])->middleware(['auth'])->name('category.list');

// Route::get('/showcat/{id}',[CatController::class, 'delete'])->middleware(['auth'])->name('delete');
Route::get('/editcat/{id}',[CatController::class, 'edit'])->middleware(['auth'])->name('editcat');
Route::post('/editcat/{id}',[CatController::class, 'update'])->middleware(['auth'])->name('updatecat');

Route::get('/product',[ProductController::class,'index'])->middleware(['auth'])->name('product.list');
Route::get('/create',[ProductController::class, 'create'])->middleware(['auth'])->name('product.create');
Route::post('/create',[ProductController::class, 'store'])->middleware(['auth']);
Route::get('/edit/{id}',[ProductController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::post('/edit/{id}',[ProductController::class, 'update'])->middleware(['auth']);

Route::get('/sku/{id}',[ProductController::class,'sku'])->middleware('auth')->name('sku');
Route::post('/sku/{id}',[ProductController::class,'add_sku'])->middleware('auth')->name('addsku');

Route::get('/list/{id}',[CatController::class, 'categorymenu'])->name('category');//indexpage
Route::get('/sublist/{id}',[CatController::class, 'subcategorymenu'])->name('subcategory');//indexpage

Route::view('test',"test");
require __DIR__.'/auth.php';
