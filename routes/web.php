<?php

use Lib\Route;
use App\Controllers\ContactController;


Route::get('/alumno', function() {
    // Obtener el valor del parámetro 'id' de la consulta
    $id = $_GET['id'] ?? '';
    return "El valor de 'id' es: " . $id;
});

// mejor que el controlador maneje la lógica:
Route::get('/', [ContactController::class, 'index']);

Route::get('/create', [ContactController::class, 'create']);
Route::post('/create', [ContactController::class, 'store']);

Route::post('/delete', [ContactController::class, 'destroy']);


Route::get('/edit', [ContactController::class, 'edit']);
Route::post('/edit', [ContactController::class, 'update']);



Route::get('/about', function () {
    return "about";
    // require_once("../resources/views/contacts/index.php");
});

//importa el orden
Route::get('/courses/prueba', function () {
    return "Esto es prueba";
});

// ejemplo:   /courses/php
Route::get('/courses/:slug', function ($slug) {
    return "El curso es " . $slug;
});


Route::dispatch();
