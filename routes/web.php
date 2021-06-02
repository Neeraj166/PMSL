<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\SubCatController;
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

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');

Route::get('/addcat',[CatController::class, 'create'])->middleware(['auth'])->name('addcat');
Route::post('/addcat',[CatController::class, 'save'])->middleware(['auth']);
Route::get('/showcat',[CatController::class, 'show'])->middleware(['auth']);
Route::get('/showcat/{id}',[CatController::class, 'delete'])->middleware(['auth'])->name('delete');

Route::get('/addsubcat',[SubCatController::class, 'create'])->middleware(['auth'])->name('addsubcat');
Route::post('/addsubcat',[SUbCatController::class, 'save'])->middleware(['auth']);
require __DIR__.'/auth.php';
