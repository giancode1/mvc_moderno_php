<?php

use Lib\Route;
use App\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::get('/create', [ContactController::class, 'create']);
Route::post('/create', [ContactController::class, 'store']);
Route::post('/delete', [ContactController::class, 'destroy']);
Route::get('/edit', [ContactController::class, 'edit']);
Route::post('/edit', [ContactController::class, 'update']);

Route::dispatch();
