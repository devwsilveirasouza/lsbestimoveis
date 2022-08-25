@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">

        <form action="{{ $action }}" method="POST">
            @csrf

            {{-- Título --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="titulo" id="titulo" />
                    <label for="titulo">Título</label>
                </div>
            </div>

            {{-- Cidade --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="cidade_id" id="cidade_id">

                        <option value="" disabled selected>Selecione uma cidade</option>
                        @foreach ($cidades as $cidade)
                            <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                        @endforeach
                    </select>
                    <label for="cidade_id">Cidade</label>
                </div>
            </div>

            {{-- Tipo --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="tipo_id" id="tipo_id">

                        <option value="" disabled selected>Selecione um tipo de imóvel</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                        @endforeach
                    </select>
                    <label for="tipo_id">Tipo de imóvel</label>
                </div>
            </div>

            {{-- Finalidade --}}
            <div class="row">
                @foreach ($finalidades as $finalidade)
                    <span class="col s2">
                        <label style="margin-right: 30px">
                            <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap"
                                value="{{ $finalidade->id }}" />
                            <span>{{ $finalidade->nome }}</span>
                        </label>
                    </span>
                @endforeach
            </div>

            {{-- Preço Dormitórios Salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="preco" id="preco" />
                    <label for="preco">Preço</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="dormitorios" id="dormitorios" />
                    <label for="dormitorios">Quantidade de dormitórios</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="salas" id="salas" />
                    <label for="salas">Quantidade de salas</label>
                </div>
            </div>

            {{-- Terreno Banheiros Garagens --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="terreno" id="terreno" />
                    <label for="terreno">Terreno em m²</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="banheiros" id="banheiros" />
                    <label for="banheiros">Quantidade de banheiros</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="garagens" id="garagens" />
                    <label for="garagens">Vagas na garagen</label>
                </div>
            </div>

            {{-- Descrição --}}
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="descricao" id="descricao" class="materialize-textarea"></textarea>
                    <label for="descricao">Descrição</label>
                </div>
            </div>

            {{-- Endereco --}}
            <div class="row">
                <div class="input-field col s5">
                    <input type="text" name="rua" id="rua" />
                    <label for="rua">Rua</label>
                </div>
                <div class="input-field col s2">
                    <input type="number" name="numero" id="numero" />
                    <label for="numero">Número</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="complemento" id="complemento" />
                    <label for="complemento">Complemento</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="bairro" id="bairro" />
                    <label for="bairro">Bairro</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="proximidades[]" id="proximidades" multiple>
                        <option value="" disabled selected>Selecione os pontos de interesse nas proximidades</option>
                        @foreach ($proximidades as $proximidade)
                            <option value="{{ $proximidade->id }}">{{ $proximidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="right-align">
                <a href="{{ route('admin.imoveis.index') }}" class="btn-flat waves-effetct">Cancelar</a>
                <button class="btn waves-effect waves-light">
                    Salvar
                </button>
            </div>

        </form>

    </section>
@endsection
