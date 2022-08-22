<?php

use App\Http\Controllers\Admin\CidadeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/cidades');

// Agrupamento de rotas
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('cidades',               [CidadeController::class, 'cidades'])->name('cidades.listar');
    Route::get('cidades/adicionar',     [CidadeController::class, 'formAdicionar'])->name('cidades.form');
    Route::post('cidades/adicionar',    [CidadeController::class, 'adicionar'])->name('cidades.adicionar');
    Route::delete('cidades/{id}',       [CidadeController::class, 'deletar'])->name('cidades.deletar');
    Route::get('cidade/{id}',           [CidadeController::class, 'formEditar'])->name('cidades.formEditar');
    Route::put('cidade/{id}',           [CidadeController::class, 'editar'])->name('cidades.editar');

});
Route::get('/sobre', function () {
    return '<h1>Sobre</h1>';
});
