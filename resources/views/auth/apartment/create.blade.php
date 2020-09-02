<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crea nuovo appartamento</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('apartment.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="titolo_appartamento">Titolo Appartamento</label>
            <input type="text" name="titolo_appartamento" class="form-control" id="titolo_appartamento" placeholder="Titolo appartamento" value="{{ old('titolo_appartamento') }}">
        </div>
        <div class="form-group">
            <label for="numero_stanze">Numero stanze</label>
            <select name="numero_stanze" id="numerostanze">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="form-group">
            <label for="numero_letti">Numero letti</label>
            <select name="numero_letti" id="numeroletti">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="form-group">
            <label for="numero_bagni">Numero bagni</label>
            <select name="numero_bagni" id="numerobagni">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="form-group">
            <label for="metriquadri">Metri quadri</label>
            <input type="number" name="metri_quadri" class="form-control" id="metriquadri" placeholder="Metri quadri" value="">
        </div>
        <div class="form-group">
            <label for="id_proprietario">Id proprietario</label>
            <input type="text" name="id_proprietario" class="form-control" id="id_proprietario" placeholder="Id proprietario" value="1">
        </div>
        <div class="form-group">
            <label for="latitudine">latitudine</label>
            <input type="text" name="latitudine" class="form-control" id="latitudine" placeholder="latitudine" value="20">
        </div>
        <div class="form-group">
            <label for="latitudine">longitudine</label>
            <input type="text" name="longitudine" class="form-control" id="longitudine" placeholder="llongitudine" value="10">
        </div>
        <div class="form-group">
            <label for="immagine_appartamento">Immagine appartamento</label>
            <input type="text" name="immagine_appartamento" class="form-control" id="immagine_appartamento" placeholder="immagine_appartamento" value="https://picsum.photos/200/300">
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</body>
</html>