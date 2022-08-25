<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cidade;
use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = 'Lista de Cidades';
        /** Ordenar dados retornados
         * ao utilizar orderBy é preciso utilizar o ->get() */
        // $cidades = Cidade::all();
        $cidades = Cidade::orderBy('nome', 'asc')->get();
        return view('admin.cidades.index')
            ->with('subtitulo', $subtitulo)
            ->with('cidades', $cidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.cidades.store');
        return view('admin.cidades.form')
            ->with('action', $action);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
    {
        Cidade::create($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome incluída com sucesso!");
        return redirect()->route('admin.cidades.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.update', [$cidade->id]);
        return view('admin.cidades.form')
            ->with('cidade', $cidade)
            ->with('action', $action);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome atualizada com sucesso!");
        return redirect()->route('admin.cidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso', 'Cidade excluída com sucesso!');
        return redirect()->route('admin.cidades.index');
    }
}
