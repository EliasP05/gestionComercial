<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); //, 'verified' se añade dentro del meddleware para vefificar el correo de registro y luego puede ngresar al sistema
//middlewaer autentica si el usuario esta autenticado.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::view('/index', 'welcome')->name('inicio');
//marca
Route::get('/marcas',[MarcaController::class,'index'])->middleware(['auth'])->name('marcas');
Route::get('/marcas/create',[MarcaController::class,'create'])->name('marcas.create');
Route::post('/marcas', [MarcaController::class,'store'])->name('marcas.store');
route::get('/marca/{marca}/edit',[MarcaController::class,'edit'])->name('marcas.edit');
Route::patch('/marca/{marca}',[MarcaController::class,'update'])->name('marcas.update');
Route::delete('/marca/{marca}',[MarcaController::class,'destroy'])->name('marcas.destroy');
//producto
Route::get('/productos',[ProdController::class,'index'])->middleware(['auth'])->name('producto');
Route::get('/productos/create',[ProdController::class,'create',])->name('products.create');
Route::get('/productos/{product}/edit',[ProdController::class,'edit'])->name('products.edit');
Route::patch('/productos/{product}',[ProdController::class,'update'])->name('products.update');
Route::Post('/productos',[ProdController::class,'store'])->name('products.store');
Route::delete('/productos/{product}',[ProdController::class,'destroy'])->name('products.destroy');
Route::get('/productos/pdf',[ProdController::class,'generarPdf'])->name('products.pdf');

//usuarios
Route::get('/usuarios',[UserController::class,'index'])->middleware(['auth'])->name('usuarios');
Route::get('/usuarios/create',[UserController::class,'create'])->name('usuarios.create');
Route::post('/usuarios',[UserController::class,'store'])->name('usuarios.store');
Route::get('/usuarios/{user}/edit',[UserController::class,'edit'])->name('usuarios.edit');
Route::patch('/usuarios/{user}',[UserController::class,'update'])->name('usuarios.update');
Route::delete('/usuarios/{user}',[UserController::class,'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/pdf',[UserController::class,'generarPdf'])->name('usuarios.pdf');

//ventas
Route::get('/ventas',[VentaController::class,'index'])->middleware(['auth'])->name('ventas');
Route::get('/ventas/pdf/{venta_id}',[VentaController::class,'generarPdf'])->name('ventas.pdf');

//carrito
Route::POST('/carrito/show',[CarritoController::class,'show'])->name('buscaProd');
Route::get('/carrito',[CarritoController::class,'index'])->middleware(['auth'])->name('carrito');
Route::get('/carrito/eliminarItem/{item}',[CarritoController::class,'quitarItem'])->name('carrito.quitarItem');
Route::GET('/carrito/actualizar/{producto}',[CarritoController::class,'updateCarro'])->name('actualizarCarro');
route::get('/carrito/cancelar',[CarritoController::class,'cancelCarrito'])->name('cancelar');
Route::POST('/carrito/confirmar',[CarritoController::class,'store'])->name('confirmar');
