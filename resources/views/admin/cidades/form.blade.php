@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">


        <form action="{{ route('admin.cidades.adicionar') }}" method="POST">
            {{-- cross-site request forgery csrf --}}
            @csrf
            <div class="input-field">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effetct">Cancelar</a>
                <button class="btn waves-effect waves-light">
                    Salvar
                </button>
            </div>

        </form>
    </section>
@endsection
