@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">

        <form action="{{ $action }}" method="POST">

            {{-- cross-site request forgery csrf --}}
            @csrf
            {{-- Verifica se existe a variável --}}
            @isset($cidade)
                @method('PUT')
            @endisset

            <div class="input-field">

                <input type="text" name="nome" id="nome" value="{{ old('nome', $cidade->nome ?? '' ) }}" />
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror

            </div>

            <div class="right-align">
                <a href="{{ route('admin.cidades.index') }}" class="btn-flat waves-effetct">Cancelar</a>
                <button class="btn waves-effect waves-light">
                    Salvar
                </button>
            </div>

        </form>
    </section>
@endsection
