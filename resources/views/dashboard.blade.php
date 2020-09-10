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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    </head>
    <body>
        <div class="wrapper-dashboard">
            <div class="block-header-dash">
                <header>
                    <nav class="nav-bar">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <button class="btn-logos dashb" type="button" id="button-addon2">
                                <img src="images/bnb-logo.svg" alt="">
                            </button></a>
                        </div>
                        <div class="text-elements">
                            @if (Route::has('login'))
                                <div class="account">
                                    <button class="btn-account dashb" type="button" id="button-addon2">
                                        <img src="images/account.svg" alt="">
                                    </button>

                                    <div class="drop-menu">
                                        <ul>
                                            @auth
                                                <li> <a href="">Il Mio Profilo</a> </li>
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

            <div class="block-center-dash">
                <div class="text-dash">
                    <div class="card-header text-center">
                        <h2>I tuoi Appartamenti:</h2>

                        @foreach ($appartamenti as $appartamento)
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
                            <h2>Servizi</h2>
                        @endforeach
                    </div>
                </div>
                <div class="img-apartment"></div>
            </div>
                
            <div class="block-footer-dash">
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
                
        </div>

        <script id="templatecard_dashboard" type="text/x-handlebars-template">
            <div class="card">
                <img src=" {{ asset('images/stanza.jpg') }}" alt="Card image cap">
                <div class="info">
                    <h4>@{{primoparametro}}</h4>
                    <p> @{{secondoparametro}}</p>
                    <a href="{{ url('/caratteristiche_auth') }}" class="btn btn-primary">@{{terzoparametro}}</a>
                    <a href="{{ url('/stats') }}" class="btn btn-primary">Statistiche</a>
                </div>
            </div>
        </script>

        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

        <script src="{{ asset('js/dashboard.js') }}" defer></script>
    </body>
</html>