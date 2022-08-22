<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function cidades()
    {
        $subtitulo = 'Lista de Cidades';

        $cidades = [
            'Blumenau',
            'Gaspar',
            'Ilhota',
            'Itajaí',
            'Indaial'
        ];
        // With
        // return view('cidades')
        // ->with('subtitulo', $subtitulo)
        // ->with('cidades', $cidades);
        // With Dinâmico
        return view('cidades')
        ->withSubtitulo($subtitulo)
        ->withCidades($cidades);

        // Array associativo
        // return view('cidades', [ 'subtitulo' => $subtitulo, 'cidades' => $cidades ]);
    }
}
