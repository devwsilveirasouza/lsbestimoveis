<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Delimitando quantidade de caracteres enviado para o banco de dados
        Schema::defaultStringLength(191);
        // Configurando os verbs http para visualização do usuário
        Route::resourceVerbs([
            'create'    => 'criar',
            'edit'      => 'editar',
        ]);
    }
}
