@extends('site.layouts.principal')

@section('conteudo-principal')
    <section class="section lighten-4 center">

        <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">

            @foreach ($cidades as $cidade)
                <a href="{{route('cidades.imoveis.index', $cidade->id)}}">

                    <div class="card-panel" style="width: 280px; height: 100%;">
                        <i class="material-icons medium green-text text-lighten-3">room</i>
                        <h4 class="black-text">{{ $cidade->nome }}</h4>
                    </div>

                </a>
            @endforeach

        </div>

    </section>
@endsection

@section('slider')
    <section class="slider">

        <ul class="slides">

            <li>
                <img src="https://source.unsplash.com/GGupkreKwxA/1900x600"> <!-- random image -->
                <div class="caption center-align">
                    <h3 style="text-shadow: 2px 2px 2px #1b5e20;">Australia!</h3>
                    <h5 style="text-shadow: 2px 2px 2px #1b5e20;" class="light blue-text text-lighten-3">Melbourne VIC.</h5>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/KQPEhYweLrQ/1900x600"> <!-- random image -->
                <div class="caption left-align">
                    <h3 style="text-shadow: 2px 2px 2px #1b5e20;">Barra da Tijuca</h3>
                    <h5 style="text-shadow: 2px 2px 2px #1b5e20;" class="light grey-text text-lighten-3">Ótima localização.</h5>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/Cn87TISYij8/1900x600"> <!-- random image -->
                <div class="caption right-align">
                    <h3 style="text-shadow: 2px 2px 2px #1b5e20;">USA</h3>
                    <h5 style="text-shadow: 2px 2px 2px #1b5e20;" class="light grey-text text-lighten-3">Alto padrão.</h5>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/mR1CIDduGLc"> <!-- random image -->
                <div class="caption center-align">
                    <h3 style="text-shadow: 2px 2px 2px #1b5e20;">Spain</h3>
                    <h5 style="text-shadow: 2px 2px 2px #1b5e20;" class="light grey-text text-lighten-3">Vila Martin.</h5>
                </div>
            </li>

        </ul>
    </section>
@endsection
