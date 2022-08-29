@extends('admin.layouts.principal')

@section('conteudo-principal')

    <scetion class="section">
        <form action="{{ route('admin.imoveis.fotos.store', $imovel->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="file-field input-field">
                <div class="btn">
                    <span>Selecionar Fotos</span>
                    <input type="file" name="foto" />
                </div>

                <div class="file-path-wrapper">
                    <input type="text" class="file-path validade" />
                </div>
            </div>

            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>

        </form>
    </scetion>

@endsection
