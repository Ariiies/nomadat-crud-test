<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

//  ruta de la página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('home');

// rutas para el controlador de productos
Route::resource('products', ProductController::class)->only(['index']);
