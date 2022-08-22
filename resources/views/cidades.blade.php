<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cidades</title>
</head>
<body>

    <h1>{{$subtitulo}}</h1>

    <ul>
        @forelse ($cidades as $cidade)
            <li>{{$cidade}}</li>
        @empty
            <li>Não existem cidades cadastradas!</li>
        @endforelse

    </ul>

</body>
</html>
