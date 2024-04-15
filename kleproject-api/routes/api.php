<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

//User

Route::post('/register', [UserController::class , 'register'])->name('register');
Route::post('/login', [UserController::class , 'login']);
Route::get('/logout', [UserController::class , 'logout'])->name('logout');
// Route::get('/login',  [UserController::class , 'login'])->name('login');


//  Product 
Route::middleware(['check.token'])->group(function () {
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::post('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('product/find/{id}', [ProductController::class, 'find'])->name('product.find');
});