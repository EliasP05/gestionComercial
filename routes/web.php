<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProdController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('inicio');

//marca
Route::get('/marcas',[MarcaController::class,'index'])->name('marcas');
Route::get('/marcas/create',[MarcaController::class,'create'])->name('marcas.create');
Route::post('/marcas', [MarcaController::class,'store'])->name('marcas.store');
route::get('/marca/{marca}/edit',[MarcaController::class,'edit'])->name('marcas.edit');
//producto
Route::get('/productos',[ProdController::class,'index'])->name('producto');
Route::get('/productos/create',[ProdController::class,'create',],[MarcaController::class,'index'])->name('products.create');
Route::get('/productos/{product}/edit',[ProdController::class,'edit'])->name('products.edit');
