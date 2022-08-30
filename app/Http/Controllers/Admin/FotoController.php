<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoRequest;
use App\Models\Foto;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
    public function store(FotoRequest $request, $idImovel)
    {
        /** Maneiras de acessar as informações que estão vindo do form */
        // dd($request->file('foto'));
        // dd($request->foto);

        /** Checar se veio a imagem na requisição */
        if ($request->hasFile('foto')) {

            /** Checar se não houve erro no uplod da imagem */
            if ($request->foto->isValid()) {

                // /** Informar onde o arquivo devo ser armazenado e depois onde irá ficar acessível */
                // $fotoURL = $request->foto->store("imoveis/$idImovel", 'public');

                // *** Intervention image - Image resize *** //
                // Pegando o caminho e o nome do arquivo pra salvar no disco
                $fotoURL = $request->foto->hashName("imoveis/$idImovel");

                // Redimensionar image
                $image = Image::make($request->foto)->fit(env('FOTO_LARGURA'), env('FOTO_ALTURA'));

                // Salvar image redimensionada no disco
                Storage::disk('public')->put($fotoURL, $image->encode());
                // *** End Intervention image - importar a classe Image e Storage *** //

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
    public function destroy(Request $request, $idImovel, $idFoto)
    {
        // Buscar as informações
        $foto = Foto::find($idFoto);
        // Apaga a imagem no disco /
        // Através do método Storage vai até a pasta public e deleta o arquivo específico
        Storage::disk('public')->delete($foto->url);
        // Apagando o registro no DB
        $foto->delete();

        $request->session()->flash('sucesso', "Foto excluída com sucesso!");

        return redirect()->route('admin.imoveis.fotos.index', $idImovel);

    }
}
