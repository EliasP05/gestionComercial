<?php

use App\Http\Controllers\ProdController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('inicio');

Route::get('/productos',[ProdController::class,'index'])->name('producto');
Route::get('/productos/create',[ProdController::class,'create'])->name('products.create');
Route::get('/productos/{product}/edit',[ProdController::class,'edit'])->name('products.edit');
