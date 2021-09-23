<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FridgeController;

Route::get('/', [FridgeController::class, 'index']);

Route::get('/add', [FridgeController::class, 'add']);
Route::post('/add', [FridgeController::class, 'create']);

Route::post('/fridge/create', [FridgeController::class, 'create']);
Route::post('/fridge/update/{id}', [FridgeController::class, 'update'])->name('fridge.update');
Route::post('/fridge/delete', [FridgeController::class, 'delete'])->name('fridge.delete');


// Route::post('/fridge/update/{id}', [FridgeController::class, 'edit']);
// Route::post('/fridge/delete/{id}', [FridgeController::class, 'remove']);
// Route::post('/fridge/delete/{id}', [FridgeController::class, 'delete']);