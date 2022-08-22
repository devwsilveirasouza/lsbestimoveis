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

    }

    public function formAdicionar()
    {
        // Criando Rota dinâmica
        $action = route('admin.cidades.adicionar');
        return view('admin.cidades.form')->withAction($action);
    }

    public function adicionar(CidadeRequest $request)
    {
        // Esta forma é permitida apartir do modelo ($fillable)
        Cidade::create($request->all());
        // Requisição da sessão para mostrar como mensagem flash
        $request->session()->flash('sucesso', "Cidade $request->nome incluída com sucesso!");

        return redirect()->route('admin.cidades.listar');
    }

    public function deletar($id, Request $request)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso', "Cidade excluído com sucesso!");
        return redirect()->route('admin.cidades.listar');
    }

    public function formEditar($id)
    {
        // Criando Rota dinâmica
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.editar', [$cidade->id]);
        return view('admin.cidades.form')
            ->withCidade($cidade)->withAction($action);
    }

    public function editar(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome atualizada com sucesso!");
        return redirect()->route('admin.cidades.listar');
    }
}
