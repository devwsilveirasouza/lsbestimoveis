@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">
        <div class="fixed-action-btn">
            <a href="{{route('admin.imoveis.create')}}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection
