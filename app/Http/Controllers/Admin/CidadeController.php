<?php

namespace App\Http\Controllers\Admin;
use App\Models\Cidade;

use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function cidades()
    {
        $subtitulo = 'Lista de Cidades';

        $cidades = Cidade::all();
        // With
        return view('admin.cidades.index')
        ->with('subtitulo', $subtitulo)
        ->with('cidades', $cidades);

        // Array associativo
        // return view('cidades', [ 'subtitulo' => $subtitulo, 'cidades' => $cidades ]);
    }

    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function adicionar(CidadeRequest $request)
    {
        // Esta forma é permitida apartir do modelo ($fillable)
        Cidade::create($request->all());
        // Requisição da sessão
        $request->session()->flash('sucesso', "Cidade $request->nome incluída com sucesso!");

        return redirect()->route('admin.cidades.listar');
    }
}
