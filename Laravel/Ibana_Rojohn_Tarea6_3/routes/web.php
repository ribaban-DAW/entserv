<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\RestaController;
use App\Http\Controllers\MultController;
use App\Http\Controllers\DivController;

Route::get('/', [InicioController::class, 'index']);
Route::get('/producto', [ProductoController::class, 'index']);
Route::get('/calculadora', [CalculadoraController::class, 'index']);

Route::get('/calculadora/suma', [SumaController::class, 'index']);
Route::post('/calculadora/suma', [SumaController::class, 'suma']);

Route::get('/calculadora/resta', [RestaController::class, 'index']);
Route::post('/calculadora/resta', [RestaController::class, 'resta']);

Route::get('/calculadora/mult', [MultController::class, 'index']);
Route::post('/calculadora/mult', [MultController::class, 'mult']);

Route::get('/calculadora/div', [DivController::class, 'index']);
Route::post('/calculadora/div', [DivController::class, 'div']);
