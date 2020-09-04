<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica appartamento</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container ct-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica un Appartamento</div>

                    <div class="card-body">
                        <form action="{{ route('apartment.update', ['apartment' => $appartamento->id]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="titolo_appartamento">Titolo Appartamento</label>
                                <input type="text" name="titolo_appartamento" class="form-control" id="titolo_appartamento" placeholder="Titolo appartamento" value="{{ old('titolo_appartamento', $appartamento->titolo_appartamento) }}">
                            </div>
                            <div class="form-group row">
                                <label for="numero_stanze">Numero stanze</label>
                                {{-- da risolvere old sulle select --}}
                                <select name="numero_stanze" id="numerostanze" value="{{ old('numero_stanze', $appartamento->numero_stanze) }}">
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
                            <div class="form-group row">
                                <label for="numero_letti">Numero letti</label>
                                <select name="numero_letti" id="numeroletti" value="{{ old('numero_letti', $appartamento->numero_letti) }}">
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
                            <div class="form-group row">
                                <label for="numero_bagni">Numero bagni</label>
                                <select name="numero_bagni" id="numerobagni" value="{{ old('numero_bagni', $appartamento->numero_bagni) }}">
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
                            <div class="form-group row">
                                <label for="metriquadri">Metri quadri</label>
                                <input type="number" name="metri_quadri" class="form-control" id="metriquadri" placeholder="Metri quadri" value="{{ old('metri_quadri', $appartamento->metri_quadri) }}">
                            </div>
                            <div class="form-group row">
                                <label for="id_proprietario">Id proprietario</label>
                                <input type="text" name="id_proprietario" class="form-control" id="id_proprietario" placeholder="Id proprietario" value="{{ old('id_proprietario', $appartamento->id_proprietario) }}">
                            </div>
                            <div class="form-group row">
                                <label for="latitudine">latitudine</label>
                                <input type="text" name="latitudine" class="form-control" id="latitudine" placeholder="latitudine" value="{{ old('latitudine', $appartamento->latitudine) }}">
                            </div>
                            <div class="form-group row">
                                <label for="latitudine">longitudine</label>
                                <input type="text" name="longitudine" class="form-control" id="longitudine" placeholder="llongitudine" value="{{ old('longitudine', $appartamento->longitudine) }}">
                            </div>
                            <div class="form-group row">
                                <label for="immagine_appartamento">Immagine appartamento</label>
                                <input type="text" name="immagine_appartamento" class="form-control" id="immagine_appartamento" placeholder="immagine_appartamento" value="{{ old('immagine_appartamento', $appartamento->immagine_appartamento) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salva</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>