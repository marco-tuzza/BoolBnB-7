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

    <div class="wrapper-apartament">
        <header>
            <nav class="nav-bar nav-create">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <button class="btn-logos btn-create" type="button" id="button-addon2">
                        <img src="../../images/bnb-logo.svg" alt="">
                    </button></a>
                </div>
                <div class="text-elements">
                    @if (Route::has('login'))
                        <div class="account">
                            <button class="btn-account btn-create" type="button" id="button-addon2">
                                <img src="/images/account.svg" alt="">
                            </button>

                            <div class="drop-menu">
                                <ul>
                                    @auth
                                    <li> <a href="{{ url('/dashboard') }}">Il Mio Profilo</a> </li>
                                    <li> <a href="{{ url('/messaggi') }}">I Miei Messaggi</a> </li>
                                    <li> <a href="{{ route('apartment.create') }}">Aggiungi Appartamento</a> </li>
                                    <li> <a href="{{ url('/') }}">Home</a> </li>
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
                        <div class="card-header">Modifica un Appartamento</div>

                        <div class="card-body card-apartment">
                            <form action="{{ route('apartment.update', ['apartment' => $appartamento->id]) }}" id="form-salva" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label for="titolo_appartamento">Titolo Appartamento</label>
                                    <input type="text" name="titolo_appartamento" class="form-control" id="titolo_appartamento" placeholder="Titolo appartamento" value="{{ old('titolo_appartamento', $appartamento->titolo_appartamento) }}">
                                </div>
                                <div class="form-group row">
                                    <label for="descrizione">Descrizione</label>
                                    <textarea class="form-control" name="descrizione" placeholder="Aggiungi una descrizione" id="descrizione" rows="15" required>{{ old('descrizione', $appartamento->descrizione) }}</textarea>
                                </div>
                                <div class="form-group row">
                                    <label for="numero_stanze">Numero stanze</label>
                                    <select name="numero_stanze" id="numerostanze" class="form-control">
                                        <option value="1" {{ $appartamento->numero_stanze == 1 ? "selected" : "" }}>1</option>
                                        <option value="2" {{ $appartamento->numero_stanze == 2 ? "selected" : "" }}>2</option>
                                        <option value="3" {{ $appartamento->numero_stanze == 3 ? "selected" : "" }}>3</option>
                                        <option value="4" {{ $appartamento->numero_stanze == 4 ? "selected" : "" }}>4</option>
                                        <option value="5" {{ $appartamento->numero_stanze == 5 ? "selected" : "" }}>5</option>
                                        <option value="6" {{ $appartamento->numero_stanze == 6 ? "selected" : "" }}>6</option>
                                        <option value="7" {{ $appartamento->numero_stanze == 7 ? "selected" : "" }}>7</option>
                                        <option value="8" {{ $appartamento->numero_stanze == 8 ? "selected" : "" }}>8</option>
                                        <option value="9" {{ $appartamento->numero_stanze == 9 ? "selected" : "" }}>9</option>
                                        <option value="10" {{ $appartamento->numero_stanze == 10 ? "selected" : "" }}>10</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="numero_letti">Numero letti</label>
                                    <select name="numero_letti" id="numeroletti" class="form-control">
                                        <option value="1" {{ $appartamento->numero_letti == 1 ? "selected" : "" }}>1</option>
                                        <option value="2" {{ $appartamento->numero_letti == 2 ? "selected" : "" }}>2</option>
                                        <option value="3" {{ $appartamento->numero_letti == 3 ? "selected" : "" }}>3</option>
                                        <option value="4" {{ $appartamento->numero_letti == 4 ? "selected" : "" }}>4</option>
                                        <option value="5" {{ $appartamento->numero_letti == 5 ? "selected" : "" }}>5</option>
                                        <option value="6" {{ $appartamento->numero_letti == 6 ? "selected" : "" }}>6</option>
                                        <option value="7" {{ $appartamento->numero_letti == 7 ? "selected" : "" }}>7</option>
                                        <option value="8" {{ $appartamento->numero_letti == 8 ? "selected" : "" }}>8</option>
                                        <option value="9" {{ $appartamento->numero_letti == 9 ? "selected" : "" }}>9</option>
                                        <option value="10" {{ $appartamento->numero_letti == 10 ? "selected" : "" }}>10</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="numero_bagni">Numero bagni</label>
                                    <select name="numero_bagni" id="numerobagni" class="form-control">
                                        <option value="1" {{ $appartamento->numero_bagni == 1 ? "selected" : "" }}>1</option>
                                        <option value="2" {{ $appartamento->numero_bagni == 2 ? "selected" : "" }}>2</option>
                                        <option value="3" {{ $appartamento->numero_bagni == 3 ? "selected" : "" }}>3</option>
                                        <option value="4" {{ $appartamento->numero_bagni == 4 ? "selected" : "" }}>4</option>
                                        <option value="5" {{ $appartamento->numero_bagni == 5 ? "selected" : "" }}>5</option>
                                        <option value="6" {{ $appartamento->numero_bagni == 6 ? "selected" : "" }}>6</option>
                                        <option value="7" {{ $appartamento->numero_bagni == 7 ? "selected" : "" }}>7</option>
                                        <option value="8" {{ $appartamento->numero_bagni == 8 ? "selected" : "" }}>8</option>
                                        <option value="9" {{ $appartamento->numero_bagni == 9 ? "selected" : "" }}>9</option>
                                        <option value="10" {{ $appartamento->numero_bagni == 10 ? "selected" : "" }}>10</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="metriquadri">Metri quadri</label>
                                    <input type="number" name="metri_quadri" class="form-control" id="metriquadri" placeholder="Metri quadri" value="{{ old('metri_quadri', $appartamento->metri_quadri) }}">
                                </div>
                                <div class="form-group row non-visibile">
                                    <label for="id_proprietario">Id proprietario</label>
                                    <input type="text" name="id_proprietario" class="form-control" id="id_proprietario" placeholder="Id proprietario" value="{{ old('id_proprietario', $appartamento->id_proprietario) }}">
                                </div>
                                <div class="form-group row non-visibile">
                                    <label for="latitudine">latitudine</label>
                                    <input type="text" name="latitudine" class="form-control" id="latitudine" placeholder="latitudine" value="{{ old('latitudine', $appartamento->latitudine) }}">
                                </div>
                                <div class="form-group row non-visibile">
                                    <label for="latitudine">longitudine</label>
                                    <input type="text" name="longitudine" class="form-control" id="longitudine" placeholder="llongitudine" value="{{ old('longitudine', $appartamento->longitudine) }}">
                                </div>
                                <div class="form-group row">
                                    <label for="immagine_appartamento">Immagine appartamento</label>
                                    <input type="text" name="immagine_appartamento" class="form-control" id="immagine_appartamento" placeholder="immagine_appartamento" value="{{ old('immagine_appartamento', $appartamento->immagine_appartamento) }}">
                                </div>
                                <div class="form-group visib row">
                                    <label for="visibile">Visibilità Appartamento</label>
                                    <select name="visibile" id="numerostanze" class="form-control">
                                        <option value="1" {{ $appartamento->visibile == 1 ? 'selected' : '' }}>Visibile</option>
                                        <option value="0" {{ $appartamento->visibile == 0 ? "selected" : "" }}>Non Visibile</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                @foreach ($servizi as $servizio)
                                    <label for="check">
                                        <input
                                        @if($errors->any())
                                            {{ in_array($servizio->id, old('servizi', [])) ? 'checked' : '' }}
                                        @else
                                            {{ $appartamento->services->contains($servizio) ? 'checked' : '' }}
                                        @endif
                                        class="form-control" id= 'check' type="checkbox" name=servizi[] value="{{$servizio->id}}">
                                        {{$servizio->titolo_servizio}}
                                    </label>
                                @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Salva</button>
                            </form>
                            <form class="d-inline" id="form-elimina" action="{{ route('apartment.destroy', ['apartment' => $appartamento->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Elimina Appartamento">
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

        <div class="form-success">
            <div class="card">
                <div class="card-header">
                    <h5>Salvataggio Appartamento...</h5>
                </div>

                <div class="card-body">
                    <h5>Sto Salvando i dati aggiornati dell'appartamento, non chiudere la scheda! <br> Verrai reindirizzato alla Homepage</h5>
                </div>
            </div>
        </div>
        <div class="form-delete">
            <div class="card">
                <div class="card-header">
                    <h5>Elimina Appartamento</h5>
                    <img src="../../images/close.svg" alt="close" class="close">
                </div>

                <div class="card-body">
                    <h5>Sei sicuro di voler eliminare l'appartamento? <br> Verrai reindirizzato al Tuo Profilo</h5>
                    <button type="submit" class="btn btn-danger" id="continue">
                        Elimina!
                    </button>
                    <button type="button" class="btn btn-secondary annulla">Annulla</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/edit.js') }}" defer></script>
</body>
</html>