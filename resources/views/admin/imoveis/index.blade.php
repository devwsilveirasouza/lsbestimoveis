@extends('admin.layouts.principal')

@section('conteudo-principal')


    <section class="section">

        <table class="hightlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($imoveis as $imovel)
                    <tr>
                        <td>{{$imovel->cidade->nome}}</td>
                        <td>{{$imovel->endereco->bairro}}</td>
                        <td>{{$imovel->titulo}}</td>
                        <td>Editar - Remover</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existem imóveis cadastrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="{{route('admin.imoveis.create')}}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>

    </section>

@endsection
