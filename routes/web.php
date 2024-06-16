 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CancionesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\HomeController;
use App\Models\Home;

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
    return view('login');
});

Route::get('/canciones', [CancionesController::class, 'index'])->middleware('auth')->name('canciones.index');
Route::get('/canciones/create', [CancionesController::class, 'create'])->name('canciones.create');
Route::post('/canciones', [CancionesController::class, 'store'])->name('canciones.store');
Route::get('/canciones/{id}', [CancionesController::class, 'show'])->name('canciones.show');
Route::get('/canciones/{id}/edit', [CancionesController::class, 'edit'])->name('canciones.edit');
Route::put('/canciones/{id}', [CancionesController::class, 'update'])->name('canciones.update');
Route::delete('/canciones/{id}', [CancionesController::class, 'destroy'])->name('canciones.destroy');

Route::get('/users', [UsuariosController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/users/create', [UsuariosController::class, 'create'])->name('users.create');
Route::post('/users', [UsuariosController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UsuariosController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UsuariosController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UsuariosController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UsuariosController::class, 'destroy'])->name('users.destroy');

Route::get('/generos', [GenerosController::class, 'index'])->middleware('auth')->name('generos.index');
Route::get('/generos/create', [GenerosController::class, 'create'])->name('generos.create');
Route::post('/generos', [GenerosController::class, 'store'])->name('generos.store');
Route::get('/generos/{id}', [GenerosController::class, 'show'])->name('generos.show');
Route::get('/generos/{id}/edit', [GenerosController::class, 'edit'])->name('generos.edit');
Route::put('/generos/{id}', [GenerosController::class, 'update'])->name('generos.update');
Route::delete('/generos/{id}', [GenerosController::class, 'destroy'])->name('generos.destroy');

Route::get('/playlists', [PlaylistController::class, 'index'])->middleware('auth')->name('playlists.index');
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlists.show');
Route::get('/playlists/{id}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
Route::put('/playlists/{id}', [PlaylistController::class, 'update'])->name('playlists.update');
Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');

Route::post('/validar-registro', [LoginController::class,'register'])->
name('validar-registro');

Route::post('/inicia-sesion', [LoginController::class,'login'])->
name('inicio-sesion');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::view('/home', "home")->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');



