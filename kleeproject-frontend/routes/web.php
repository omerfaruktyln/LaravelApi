<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

Route::get('/', function() {
    return view("index");
});

//User

Route::get('/register', [UserController::class , 'create'])->name('register');
Route::post('/register', [UserController::class , 'register'])->name('register');
Route::get('/login',  [UserController::class , 'sigin'])->name('login');
Route::post('/login', [UserController::class , 'login']);
Route::get('/logout', [UserController::class , 'logout'])->name('logout');

//  Product 
Route::middleware(['web', 'check.token'])->group(function () {
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/find/{id}', [ProductController::class, 'find'])->name('product.find');
 
});