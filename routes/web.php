<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/hola', [\App\Http\Controllers\ProductosController::class, 'hola']);
Route::post('/datosFormulario', [\App\Http\Controllers\ProductosController::class, 'datosFormulario']);


Route::prefix('productos')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductosController::class, 'index']);
    Route::get('/listarProductos', [\App\Http\Controllers\ProductosController::class, 'listarProductos']);
    Route::get('/listarUnProducto/{id}', [\App\Http\Controllers\ProductosController::class, 'listarUnProducto']);
});


Route::prefix('session')->group(function () {
   Route::get('set', function () {
//       session()->put('data.active', true);
//       session()->put('data.precio', 12);

       $data = [
           'active' => false,
           'precio' => 10
       ];
       Session::put('data', $data);

       //otros procesos descuento 50%
//       session()->put('data.precio', 6);
   });
   Route::get('get', function () {
       return
       session()->all();
   });
   Route::get('delete', function () {
       session()->forget('active');
   });
});
Route::get('/test', [ProductosController::class, 'prueba']);

Route::post('/cambio-idioma', [ProductosController::class, 'cambioIdioma']);


















Route::get('/prueba/productos', [\App\Http\Controllers\UserController::class, 'getProducts']);
Route::get('/pruebaApi', [\App\Http\Controllers\UserController::class, 'testHttp']);




Route::prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('user.principal');
    Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/create', [\App\Http\Controllers\UserController::class, 'index']);
})->as('users');
















require __DIR__.'/auth.php';
require __DIR__.'/auth.php';
