<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dettagli appartamento</title>
</head>
<body>
    <h2>Id appartamento:</h2>
    <p>{{$appartamento->id}}</p>
    <h2>Titolo appartamento:</h2>
    <p>{{$appartamento->titolo_appartamento}}</p>
    <h2>ID proprietario:</h2>
    <p>{{$appartamento->id_proprietario}}</p>
    <h2>Numero stanze:</h2>
    <p>{{$appartamento->numero_stanze}}</p>
    <h2>Numero letti:</h2>
    <p>{{$appartamento->numero_letti}}</p>
    <h2>Numero bagni:</h2>
    <p>{{$appartamento->numero_bagni}}</p>
    <h2>Metri quadri:</h2>
    <p>{{$appartamento->metri_quadri}}</p>
    <h2>Immagine:</h2>
    <img src="{{$appartamento->immagine_appartamento}}" alt="">
    <a href='{{ route('apartment.index')}}'>Lista appartamenti</a>
    <form class="d-inline" action="{{ route('apartment.destroy', ['apartment' => $appartamento->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-small btn-danger" value="Elimina">
    </form>
</body>
</html>