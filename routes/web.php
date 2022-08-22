<?php

use App\Http\Controllers\Admin\CidadeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CidadeController::class, 'cidades']);

Route::get('/sobre', function () {
    return '<h1>Sobre</h1>';
});
