<?php

use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\ImovelController;
use App\Http\Controllers\Site\CidadeController as SiteCidadeController;
use Illuminate\Support\Facades\Route;

// PARTE ADMINISTRATIVA - AGRUPAMENTO DE ROTAS
Route::prefix('admin')->name('admin.')->group(function () {
    // Informando que não será utilizado a rota 'show' logo não teremos este método
    Route::resource('cidades',          CidadeController::class)->except(['show']);
    Route::resource('imoveis',          ImovelController::class);
    Route::resource('imoveis.fotos',    FotoController::class)->except('edit', 'update', 'show');
});

// SITE PRINCIPAL
Route::resource('/', SiteCidadeController::class)->only('index');
