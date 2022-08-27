@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">

        {{-- Imóvel, tipo e finalidade --}}
        <h4>{{$imovel->titulo}}</h4>

        <div class="row">
            <span class="col s12">
                <h5>Tipo de imóvel</h5>
                <p>{{$imovel->tipo->nome}}</p>
            </span>
        </div>

        <div class="row">
            <span class="col s12">
                <h5>Finalidade do imóvel</h5>
                <p>{{$imovel->finalidade->nome}}</p>
            </span>
        </div>
        {{-- Preço, dormitórios e salas --}}
        <div class="row">
            <span class="col s4">
                <h5>Preço do imóvel</h5>
                <p>{{$imovel->preco}}</p>
            </span>

            <span class="col s4">
                <h5>Quantidade de dormitórios</h5>
                <p>{{$imovel->dormitorios}}</p>
            </span>

            <span class="col s4">
                <h5>Quantidade de salas</h5>
                <p>{{$imovel->salas}}</p>
            </span>
        </div>
        {{-- Terreno, banheiros e garagens --}}
        <div class="row">
            <span class="col s4">
                <h5>Terreno em m²</h5>
                <p>{{$imovel->terreno}}</p>
            </span>

            <span class="col s4">
                <h5>Quantidade de banheiros</h5>
                <p>{{$imovel->banheiros}}</p>
            </span>

            <span class="col s4">
                <h5>Vagas na garagem</h5>
                <p>{{$imovel->garagens}}</p>
            </span>
        </div>
        {{-- Proximidades --}}
        <div class="row">
            <span class="col s12">
                <h5>Pontos de interesse nas proximidades</h5>
                <div style="display: flex;flex-wrap: wrap;">
                    @foreach ($imovel->proximidades as $proximidade)
                        <span style="margin-right: 25px; font-weight: 600;">{{$proximidade->nome}}</span>
                    @endforeach
                </div>
            </span>
        </div>
        {{-- Endereço --}}
        <div class="row">
            <span class="col s12">

                <p> Rua {{$imovel->endereco->rua}}, Nº {{$imovel->endereco->numero}}, Complemento {{$imovel->endereco->complemento}}</p>

                <p>Bairro {{$imovel->endereco->bairro}}, Cidade {{$imovel->cidade->nome}}</p>

            </span>
        </div>
        {{-- Descrição --}}
        <div class="row">
            <span class="col s12">
                <h5>Descrição do imóvel</h5>
                <p>{{$imovel->descricao}}</p>
            </span>
        </div>

        <div class="right-align">
            <a href="{{url()->previous()}}" class="btn-flat waves-effect">Voltar</a>
        </div>

    </section>

@endsection
