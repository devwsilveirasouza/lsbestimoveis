<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Imovel;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idImovel)
    {
        $imovel = Imovel::find($idImovel);

        $fotos = Foto::where('imovel_id', $idImovel)->get();

        return view('admin.imoveis.fotos.index')
            ->with('imovel', $imovel)
            ->with('fotos', $fotos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idImovel)
    {
        $imovel = Imovel::find($idImovel);

        return view('admin.imoveis.fotos.form')
            ->with('imovel', $imovel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idImovel)
    {
        /** Maneiras de acessar as informações que estão vindo do form */
        // dd($request->file('foto'));
        // dd($request->foto);

        /** Checar se veio a imagem na requisição */
        if ($request->hasFile('foto')) {

            /** Checar se não houve erro no uplod da imagem */
            if ($request->foto->isValid()) {

                /** Informar onde o arquivo devo ser armazenado e depois onde irá ficar acessível */
                $fotoURL = $request->foto->store("imoveis/$idImovel", 'public');

                /** Armazenando o caminho da foto no DB */
                $foto = new Foto();
                $foto->url = $fotoURL;
                $foto->imovel_id = $idImovel;
                $foto->save();
            }
        }

        $request->session()->flash('sucesso', "Foto imcluída com sucesso!");

        return redirect()->route('admin.imoveis.fotos.index', $idImovel);
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
