<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">

    <title>Best Imóveis</title>
</head>

<body>

    {{-- Menu Topo --}}
    <nav class="teal blue lighten-1">
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Best Imóveis</a>
            </div>
        </div>
    </nav>

    {{-- Conteudo Principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    {{-- Conteúdo Secundário --}}
    <div>
        @yield('secundario')
    </div>

    <!-- Compiled and minified JavaScript -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}
    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>

</body>

</html>
