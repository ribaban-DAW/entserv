<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\MagoController;

Route::get('/', function() { return view('welcome'); });

Route::get('/proyectos', ProyectoController::class . '@index')->name('proyectos.index');
Route::get('/proyectos/create', ProyectoController::class . '@create')->name('proyectos.create');
Route::get('/proyectos/{animal}', ProyectoController::class . '@show')->name('proyectos.show');
Route::get('/proyectos/{animal}/edit', ProyectoController::class . '@edit')->name('proyectos.edit');
Route::post('/proyectos', ProyectoController::class . '@store')->name('proyectos.store');
Route::put('/proyectos/{animal}', ProyectoController::class . '@update')->name('proyectos.update');
Route::delete('/proyectos/{animal}', ProyectoController::class . '@destroy')->name('proyectos.destroy');

Route::get('/magos', MagoController::class . '@index')->name('magos.index');
Route::get('/magos/create', MagoController::class . '@create')->name('magos.create');
Route::get('/magos/{animal}', MagoController::class . '@show')->name('magos.show');
Route::get('/magos/{animal}/edit', MagoController::class . '@edit')->name('magos.edit');
Route::post('/magos', MagoController::class . '@store')->name('magos.store');
Route::put('/magos/{animal}', MagoController::class . '@update')->name('magos.update');
Route::delete('/magos/{animal}', MagoController::class . '@destroy')->name('magos.destroy');
