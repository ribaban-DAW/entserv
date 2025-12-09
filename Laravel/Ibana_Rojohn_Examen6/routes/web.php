<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PublicacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', UsuarioController::class . '@index')->name('usuarios.index');
Route::get('/usuarios/create', UsuarioController::class . '@create')->name('usuarios.create');
Route::get('/usuarios/{usuario}', UsuarioController::class . '@show')->name('usuarios.show');
Route::get('/usuarios/{usuario}/edit', UsuarioController::class . '@edit')->name('usuarios.edit');
Route::post('/usuarios', UsuarioController::class . '@store')->name('usuarios.store');
Route::put('/usuarios/{usuario}', UsuarioController::class . '@update')->name('usuarios.update');
Route::delete('/usuarios/{usuario}', UsuarioController::class . '@destroy')->name('usuarios.destroy');

Route::get('/categorias', CategoriaController::class . '@index')->name('categorias.index');
Route::get('/categorias/create', CategoriaController::class . '@create')->name('categorias.create');
Route::post('/categorias', CategoriaController::class . '@store')->name('categorias.store');

Route::get('/publicaciones', PublicacionController::class . '@index')->name('publicaciones.index');
Route::get('/publicaciones/create', PublicacionController::class . '@create')->name('publicaciones.create');
Route::get('/publicaciones/{publicaciones}', PublicacionController::class . '@show')->name('publicaciones.show');
Route::get('/publicaciones/{publicaciones}/edit', PublicacionController::class . '@edit')->name('publicaciones.edit');
Route::post('/publicaciones', PublicacionController::class . '@store')->name('publicaciones.store');
Route::put('/publicaciones/{publicaciones}', PublicacionController::class . '@update')->name('publicaciones.update');
Route::delete('/publicaciones/{publicaciones}', PublicacionController::class . '@destroy')->name('publicaciones.destroy');
