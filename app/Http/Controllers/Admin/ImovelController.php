<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Finalidade;
use App\Models\Imovel;
use App\Models\Proximidade;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.imoveis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** Atribuir o modelo Cidade a variável $cidade */
        $cidades        = Cidade::all();
        $tipos          = Tipo::all();
        $finalidades    = Finalidade::all();
        $proximidades   = Proximidade::all();

        $action = route('admin.imoveis.store');

        return view('admin.imoveis.form')
        ->with('action', $action)
        ->with('cidades', $cidades)
        ->with('tipos', $tipos)
        ->with('finalidades', $finalidades)
        ->with('proximidades', $proximidades);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Criando transação */
        DB::beginTransaction();

        $imovel = Imovel::create($request->all());
        $imovel->endereco()->create($request->all());

        if($request->has('proximidades')){

            $imovel->proximidades()->sync($request->proximidades);

        }

        DB::commit();

        $request->session()->flash('sucesso', "Imovel incluído com sucesso!");
        return redirect()->route('admin.imoveis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
