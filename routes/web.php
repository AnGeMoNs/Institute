<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [RegisterController::class,'register'])->name('register.web');
Route::get('/register', [RegisterController::class,'register'])->name('register.web1');
Route::post('/recibe-register',[RegisterController::class,'registers'])->name('register-recibe');
Route::get('/login', [LoginController::class,'login'])->name('login.web');
Route::post('/recibe-login',[LoginController::class,'logins'])->name('login-recibe');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/menu', [ProductoController::class,'inicio'])->name('menu.web');
    Route::get('/producto/crear', [ProductoController::class, 'mostrarCrear'])->name('producto.mostrarCrear');
    Route::post('/producto/crear', [ProductoController::class, 'crear'])->name('producto.crear');
    Route::delete('/producto/eliminar/{id}', [ProductoController::class, 'eliminar'])->name('producto.eliminar');
    Route::get('/producto/editar/{id}', [ProductoController::class, 'mostrarEditar'])->name('producto.mostrarEditar');
    Route::post('/producto/editar/{id}', [ProductoController::class, 'editar'])->name('producto.editar');
    Route::get('/producto/buscar', [ProductoController::class, 'buscar'])->name('producto.buscar');
});

