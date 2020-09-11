<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolBnB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Raleway:wght@400;500&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />
        <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    </head>
    <body>
        <div class="wrapper-page-caratteristiche">

            <div class="first-block">
                <header>
                    <nav class="nav-bar">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <button class="btn-logos dashb" type="button" id="button-addon2">
                                <img src="http://localhost:8000/images/bnb-logo.svg" alt="">
                            </button></a>
                        </div>
                        <div class="text-elements">
                            @if (Route::has('login'))
                                <div class="account">
                                    <button class="btn-account dashb" type="button" id="button-addon2">
                                        <img src="http://localhost:8000/images/account.svg" alt="">
                                    </button>

                                    <div class="drop-menu">
                                        <ul>
                                            @auth
                                                <li> <a href="{{ url('/dashboard') }}">Il Mio Profilo</a> </li>
                                                <li> <a href="{{ route('apartment.create') }}">Aggiungi Appartamento</a> </li>
                                                <li> <a href="{{ url('/') }}">Home</a></li>
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
            </div>

            <main>
            <div class="main-container">
                <section class="prima">
                    <div class="intestazione">
                        <h1>{{$appartamento->titolo_appartamento}}</h1>
                        <p>Metri Quadri: {{$appartamento->metri_quadri}}</p>
                    </div>
                    <div class="img-cover">
                        <img src="{{$appartamento->immagine_appartamento}}" alt="Card image cap">
                    </div>
                </section>
                <section class="seconda">
                    <div class="informazioni">
                        <h2>Appartamento affittato da "Nome Utente"</h2>
                        <div class="infos">
                            <span>Metri Quadri: {{$appartamento->metri_quadri}}</span>
                            <span>Stanze: {{$appartamento->numero_stanze}}</span>
                            <span>Letti: {{$appartamento->numero_letti}}</span>
                            <span>Bagni: {{$appartamento->numero_bagni}}</span>
                        </div>
                        <div class="infos-3">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>

                        @if ($appartamento->user_id != Auth::user()->id)
                            <div class="infos-4">
                                <h2>Contatta l'host</h2>
                                <div class="">
                                    <form action="{{ route('message_store') }}" method="post">
                                    @csrf
                                    E-mail:<br>
                                    <input type="text" name="email_mittente" value="{{(Auth::user()) ? Auth::user()->email : ''}}"><br>
                                    Testo:<br>
                                    <input class="text" type="text" name="testo_messaggio">
                                    <input type="text" name="id_appartamento" value="{{$appartamento->id}}" hidden>
                                    <input type="text" name="id_ricevente" value="{{$appartamento->id_proprietario}}" hidden>
                                    <input type="date" name="data_invio">
                                    <button type="submit">Invia</button>
                                    <input type="reset">
                                    </form>
                                </div>
                            </div>
                        @endif

                        <div class="infos-5">
                            <div class="map">
                                <div id="map-example"></div>
                                <input type="search" id="input-map" class="form-control">

                                <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
                                <script>
                                (function() {
                                  var latlng = {
                                    lat: {{$appartamento->latitudine}},
                                    lng: {{$appartamento->longitudine}}
                                  };

                                  var placesAutocomplete = places({
                                    appId: 'plT92Q60ZYBJ',
                                    apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
                                    container: document.querySelector('#input-map')
                                  }).configure({
                                    aroundLatLng: latlng.lat + ',' + latlng.lng,
                                    aroundRadius: 10 * 1000,
                                    type: 'address'
                                  });

                                  var map = L.map('map-example', {
                                    scrollWheelZoom: false,
                                    zoomControl: false
                                  });

                                  var osmLayer = new L.TileLayer(
                                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                      minZoom: 16,
                                      maxZoom: 20,
                                      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
                                    }
                                  );
                                  //
                                  var markers = [];

                                  map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
                                  map.addLayer(osmLayer);
                                  //
                                  // placesAutocomplete.on('suggestions', handleOnSuggestions);
                                  // placesAutocomplete.on('cursorchanged', handleOnCursorchanged);
                                  // placesAutocomplete.on('change', handleOnChange);
                                  //
                                  // function handleOnSuggestions(e) {
                                  //   markers.forEach(removeMarker);
                                  //   markers = [];
                                  //
                                  //   if (e.suggestions.length === 0) {
                                  //     map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
                                  //     return;
                                  //   }
                                  //
                                  //   e.suggestions.forEach(addMarker);
                                  //   findBestZoom();
                                  // }
                                //
                                //   function handleOnChange(e) {
                                //     markers
                                //       .forEach(function(marker, markerIndex) {
                                //         if (markerIndex === e.suggestionIndex) {
                                //           markers = [marker];
                                //           marker.setOpacity(1);
                                //           findBestZoom();
                                //         } else {
                                //           removeMarker(marker);
                                //         }
                                //       });
                                //   }
                                //
                                //   function handleOnClear() {
                                //     map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
                                //   }
                                //
                                //   function handleOnCursorchanged(e) {
                                //     markers
                                //       .forEach(function(marker, markerIndex) {
                                //         if (markerIndex === e.suggestionIndex) {
                                //           marker.setOpacity(1);
                                //           marker.setZIndexOffset(1000);
                                //         } else {
                                //           marker.setZIndexOffset(0);
                                //           marker.setOpacity(0.5);
                                //         }
                                //       });
                                //   }
                                //
                                  function addMarker(suggestion) {
                                    var marker = L.marker(suggestion.latlng, {opacity: .4});
                                    marker.addTo(map);
                                    markers.push(marker);
                                  }
                                //
                                //   function removeMarker(marker) {
                                //     map.removeLayer(marker);
                                //   }
                                //
                                //   function findBestZoom() {
                                //     var featureGroup = L.featureGroup(markers);
                                //     map.fitBounds(featureGroup.getBounds().pad(0.5), {animate: false});
                                //   }
                                })();
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="casella">
                        <div class="servizi">
                            <h2>Servizi</h2>
                            <ul>
                                @foreach ($servizi as $servizio)
                                    <li>{{$servizio->titolo_servizio}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sistemazione">
                            <div class="card-caratteristiche">
                                <h3>Numero di stanze: {{$appartamento->numero_stanze}}</h3>
                                <p>Numero di letti: {{$appartamento->numero_letti}}</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

            <footer class="third-block">
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

            <div class="form-accedi">
                <div class="card">
                    <div class="card-header">
                        {{ __('Login') }}
                        <img src="images/close.svg" alt="close" class="close">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="form-registrati">
                <div class="card">
                    <div class="card-header">
                        {{ __('Register') }}
                        <img src="images/close.svg" alt="close" class="close">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cognome" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                                <div class="col-md-6">
                                    <input id="cognome" type="text" class="form-control @error('cognome') is-invalid @enderror" name="cognome" value="{{ old('cognome') }}" required autocomplete="cognome" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('data') }}</label>

                                <div class="col-md-6">
                                    <input id="data" type="date" class="form-control @error('data') is-invalid @enderror" name="data_di_nascita" required autocomplete="new-data">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

        <script src="{{ asset('js/welcome.js') }}" defer></script>
    </body>
</html>
