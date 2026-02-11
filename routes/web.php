<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



require __DIR__.'/auth.php';
