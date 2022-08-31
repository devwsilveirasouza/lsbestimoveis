<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImovelRequest;
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
    // Sem pesquisa no index
    // public function index()
    // {
    //     /** Buscar dados para mostrar na view
    //      * Lazy loading */
    //     // $imoveis = Imovel::all();
    //     /** Eager loading */
    //     // $imoveis = Imovel::with(['cidade', 'endereco'])
    //     // ->orderBy('titulo', 'asc')
    //     // ->get();

    //     /** Ordenar com relacionamentos */
    //     $imoveis = Imovel::join('cidades', 'cidades.id', '=', 'imoveis.cidade_id') // Busca no modelo relacionado
    //         ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id') // Busca no modelo relacionado
    //         ->orderBy('cidades.nome', 'asc') // Determinar campo e ordem para ordenação dos dados
    //         ->orderBy('enderecos.bairro', 'asc') // Determinar campo e ordem para ordenação dos dados
    //         ->orderBy('titulo', 'asc') // Determinar campo e ordem para ordenação dos dados
    //         ->get();

    //     return view('admin.imoveis.index')
    //         ->with('imoveis', $imoveis);
    // }
        // Com campos de pesquisa no index
    public function index(Request $request)
    {
        /** Ordenar com relacionamentos */
        // Montando a consulta //
        $imoveis = Imovel::join('cidades', 'cidades.id', '=', 'imoveis.cidade_id') // Busca no modelo relacionado
            ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id') // Busca no modelo relacionado
            ->orderBy('cidades.nome', 'asc') // Determinar campo e ordem para ordenação dos dados
            ->orderBy('enderecos.bairro', 'asc') // Determinar campo e ordem para ordenação dos dados
            ->orderBy('titulo', 'asc'); // Determinar campo e ordem para ordenação dos dados

        // Pegando os valores para acessar na view
        $cidade_id = $request->cidade_id;
        $titulo = $request->titulo;

        // Filtro de cidade
        if($cidade_id){ // ou ($request->cidade_id)
            $imoveis->where('cidades.id', $cidade_id);
        }
        // Filtro de título
        if($titulo){ // ou ($request->titulo)
            $imoveis->where('titulo', 'like', "%$titulo%");
        }

        // Pegando os dados retornados a partir da execução da query //
        // $imoveis = $imoveis->get();

        // Pegando os dados retornados com paginação //
        // withQueryString -> faz com que não perca os filtros ao clicar para navegar para outra página
        $imoveis = $imoveis->paginate(env('PAGINACAO'))->withQueryString();

        $cidades = Cidade::orderBy('nome')->get();

        return view('admin.imoveis.index')
            ->with('imoveis', $imoveis)
            ->with('cidades', $cidades)
            ->with('titulo', $titulo)
            ->with('cidade_id', $cidade_id);
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
    public function store(ImovelRequest $request)
    {
        /** Criando transação */
        DB::beginTransaction();

        $imovel = Imovel::create($request->all());
        /** Chamando o método do relacinamento endereço para ser criado */
        $imovel->endereco()->create($request->all());

        if ($request->has('proximidades')) {

            $imovel->proximidades()->sync($request->proximidades);
        }

        DB::Commit();

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
        /** Carregando informações do modo eager loading */
        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'tipo', 'proximidades'])->find($id);

        // Chamar a view
        return view('admin.imoveis.show')
            ->with('imovel', $imovel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Carregar informações através do Eager loading
        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'tipo', 'proximidades'])->find($id);

        $cidades        = Cidade::all();
        $tipos          = Tipo::all();
        $finalidades    = Finalidade::all();
        $proximidades   = Proximidade::all();

        $action = route('admin.imoveis.update', $imovel->id);

        return view('admin.imoveis.form')
            ->with('action', $action)
            ->with('imovel', $imovel)
            ->with('cidades', $cidades)
            ->with('tipos', $tipos)
            ->with('finalidades', $finalidades)
            ->with('proximidades', $proximidades);
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
        /**
         * Realiza a busca das informações
         * Lazy loading
         */
        $imovel = Imovel::find($id);

        DB::beginTransaction();
        // Realiza a atualização em massa
        $imovel->update($request->all());
        // Realiza a ligação / atualização do relacionamento
        $imovel->endereco->update($request->all());

        if ($request->has('proximidades')) {
            $imovel->proximidades()->sync($request->proximidades);
        }

        DB::Commit();

        $request->session()->flash('sucesso', "Imóvel atualizado com sucesso!");
        return redirect()->route('admin.imoveis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Imovel::destroy($id); // Devido ao relacionamento o banco exclui a cidade relacionada
        $imovel = Imovel::find($id);
        /** Inicia a transação */
        DB::beginTransaction();
        /** Carrega a informação
         * para ser removido o endereço através do modelo endereço */
        $imovel->endereco->delete();
        // Remover o imóvel
        $imovel->delete();

        DB::Commit();
        /** Finaliza a transação */
        $request->session()->flash('sucesso', 'Imóvel excluído com sucesso!');
        return redirect()->route('admin.imoveis.index');
    }
}
