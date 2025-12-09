<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/', AnimalController::class . '@index')->name('animals.index');
Route::get('/animals/create', AnimalController::class . '@create')->name('animals.create');
Route::get('/animals/{animal}', AnimalController::class . '@show')->name('animals.show');
Route::get('/animals/{animal}/edit', AnimalController::class . '@edit')->name('animals.edit');
Route::post('/animals', AnimalController::class . '@store')->name('animals.store');
Route::put('/animals/{animal}', AnimalController::class . '@update')->name('animals.update');
Route::delete('/animals/{animal}', AnimalController::class . '@destroy')->name('animals.destroy');
