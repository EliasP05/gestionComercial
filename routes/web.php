<?php

use App\Http\Controllers\ProdController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('inicio');

Route::get('productos', [ProdController::class,'index'])->name('producto');

Route::get('productos/{product}',[ProdController::class,'show']);
