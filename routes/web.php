<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CancionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/canciones', [CancionesController::class, 'index'])->middleware('auth')->name('canciones.index');
Route::get('/canciones/create', [CancionesController::class, 'create'])->name('canciones.create');
Route::post('/canciones', [CancionesController::class, 'store'])->name('canciones.store');
Route::get('/canciones/{id}', [CancionesController::class, 'show'])->name('canciones.show');
Route::get('/canciones/{id}/edit', [CancionesController::class, 'edit'])->name('canciones.edit');
Route::put('/canciones/{id}', [CancionesController::class, 'update'])->name('canciones.update');
Route::delete('/canciones/{id}', [CancionesController::class, 'destroy'])->name('canciones.destroy');

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');

Route::post('/validar-registro', [LoginController::class,'register'])->
name('validar-registro');

Route::post('/inicia-sesion', [LoginController::class,'login'])->
name('inicio-sesion');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');



