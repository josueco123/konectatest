<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/saveproduct', [ProductController::class, 'create'] )->name('saveproduct');
Route::post('/saveproduct', [ProductController::class, 'store'] )->name('saveproduct');
Route::get('/editproduct/{id}', [ProductController::class, 'edit'] )->name('editproduct');
Route::post('/editproduct/{id}', [ProductController::class, 'update'] )->name('updateproduct');
Route::delete('/deletproduct/{id}', [ProductController::class, 'destroy'] )->name('deletproduct');