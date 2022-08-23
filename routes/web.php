<?php

use App\Http\Controllers\Admin\CidadeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/cidades');

// Agrupamento de rotas
Route::prefix('admin')->name('admin.')->group(function () {
    // Informando que não será utilizado a rota 'show' logo não teremos este método
    Route::resource('cidades', CidadeController::class)->except(['show']);

});

