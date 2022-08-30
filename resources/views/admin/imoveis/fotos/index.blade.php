@extends('admin.layouts.principal')

@section('conteudo-principal')
    <h4>{{ $imovel->titulo }}</h4>

    <scetion class="section">

        <div class="flex-container">
            @forelse ($fotos as $foto)
                <div class="flex-item">

                    <span class="btn-fechar">
                        {{-- Excluir --}}
                        <form action="{{ route('admin.imoveis.fotos.destroy', [$imovel->id, $foto->id]) }}" method="POST"
                            style="display: inline;" title="remover" >
                            @csrf
                            @method('DELETE')

                            <button style="border:0;background:transparent;" type="submit">
                                <span style="cursor: pointer;">
                                    <i class="material-icons red-text text-accent-3">delete_forever</i>
                                </span>
                            </button>

                        </form>
                    </span>

                    <img src="{{ asset("storage/$foto->url") }}" width="293" height="140" />

                </div>

            @empty

                <tr>
                    <td colspan="4">Não existem fotos para este imóvel.</td>
                </tr>
            @endforelse
        </div>


    </scetion>

    <div class="fixed-action-btn">
        <a href="{{ route('admin.imoveis.fotos.create', $imovel->id) }}"
            class="btn-floating btn-large waves-effect waves-light"><i class="large material-icons">add</i></a>
    </div>

@endsection
