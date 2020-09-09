<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crea nuovo appartamento</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
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

    <div class="wrapper-apartament">
        <header>
            <nav class="nav-bar nav-create">
                <div class="logo">
                    <button class="btn-logos" type="button" id="button-addon2">
                        <img src="../images/bnb-logo.svg" alt="">
                    </button>
                </div>
                <div class="text-elements">
                    @if (Route::has('login'))
                        <div class="account">
                            <button class="btn-account" type="button" id="button-addon2">
                                <img src="../images/account.svg" alt="">
                            </button>
    
                            <div class="drop-menu">
                                <ul>
                                    @auth
                                        <li> <a href="">Il Mio Profilo</a> </li>
                                        <li> <a href="">Aggiungi Appartamento</a> </li>
                                        <li> <a href="{{ route('home') }}">Home</a> </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @else
                                            <li id="login">Accedi</li>
                                            {{-- <li id="login"> <a href="{{ route('login') }}">Accedi</a> </li> --}}
                                            <li id="register">Registrati</li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </nav>
        </header>
    
        <div class="container ct-form">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Aggiungi un Appartamento</div>
    
                        <div class="card-body card-apartment">
                            <form action="{{ route('apartment.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="titolo_appartamento">Titolo Appartamento</label>
                                    <input type="text" name="titolo_appartamento" class="form-control" id="titolo_appartamento" placeholder="Titolo appartamento" value="{{ old('titolo_appartamento') }}" required>
                                </div>
                                <div class="form-group row">
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
                                <div class="form-group row">
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
                                <div class="form-group row">
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
                                <div class="form-group row">
                                    <label for="metriquadri">Metri quadri</label>
                                    <input type="number" name="metri_quadri" class="form-control" id="metriquadri" placeholder="Metri quadri" value="">
                                </div>
                                <div class="form-group row non-visibile">
                                    <label for="id_proprietario">Id proprietario</label>
                                    <input type="text" name="id_proprietario" class="form-control" id="id_proprietario" placeholder="Id proprietario" value="1">
                                </div>
                                <div class="form-group row">
                                    <label for="form-address">Indirizzo*</label>
                                    <input type="search" class="form-control" id="form-address" placeholder="Dove vivi?" />
                                </div>
                                <div class="form-group row">
                                    <label for="form-address2">Indirizzo 2</label>
                                    <input type="text" class="form-control" id="form-address2" placeholder="Numero e nome della via" />
                                </div>
                                <div class="form-group row">
                                    <label for="form-city">Citta*</label>
                                    <input type="text" class="form-control" id="form-city" placeholder="Città">
                                </div>
                                <div class="form-group row">
                                    <label for="form-zip">Codice Postale*</label>
                                    <input type="text" class="form-control" id="form-zip" placeholder="Codice Postale">
                                </div>
                                <div class="form-group row non-visibile">
                                    <label for="latitudine">latitudine</label>
                                    <input type="text" name="latitudine" class="form-control" id="latitudine" placeholder="latitudine" value="20">
                                </div>
                                <div class="form-group row non-visibile">
                                    <label for="latitudine">longitudine</label>
                                    <input type="text" name="longitudine" class="form-control" id="longitudine" placeholder="llongitudine" value="10">
                                </div>
                                <div class="form-group row">
                                    <label for="immagine_appartamento">Immagine appartamento</label>
                                    <input type="text" name="immagine_appartamento" class="form-control" id="immagine_appartamento" placeholder="immagine_appartamento" value="https://picsum.photos/200/300">
                                </div>
                                <div class="form-group row">
                                @foreach ($servizi as $servizio)
                                    <label for="immagine_appartamento">
                                        <input {{ in_array($servizio->id, old('servizi', [])) ? 'checked' : '' }} class="form-control" type="checkbox" name=servizi[] value="{{$servizio->id}}">
                                        {{$servizio->titolo_servizio}}
                                    </label>
                                @endforeach 
                                </div>
                                <button type="submit" class="btn btn-primary">Salva</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="foot-create">
            <div class="wrap-footer">
                <div class="block1">
                    <ul>
                        <li class="title-footer">INFORMAZIONI</li>
                        <li>Come funziona Airbnb</li>
                        <li>Newsroom</li>
                        <li>BoolnBnB Plus</li>
                        <li>BoolnBnB for Work</li>
                    </ul>
                </div>
                <div class="block2">
                    <ul>
                        <li class="title-footer">COMMUNITY</li>
                        <li>Diversità e appartenenza</li>
                        <li>Accessibilità</li>
                        <li>Alloggi per l'emergenza</li>
                        <li>Invita degli amici</li>
                    </ul>
                </div>
                <div class="block3">
                    <ul>
                        <li class="title-footer">OSPITA</li>
                        <li>Diventa un host</li>
                        <li>Offri un'Esperienza</li>
                        <li>Ospitare responsabilmente</li>
                        <li>Community Center</li>
                    </ul>
                </div>
            </div>
            <div class="bottom-footer">
                <section> <i>© 2020 Team7 Boolean, Inc. All rights reserved</i></section>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/appartment.js') }}" defer></script>
</body>
</html>
