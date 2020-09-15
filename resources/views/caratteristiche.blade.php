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

            <div class="first-block-ch">
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

            <div class="second-block-ch">
                <div class="intestazione">
                    <h2>{{$appartamento->titolo_appartamento}}</h2>
                </div>

                <div class="img-cover">
                    <img src="{{$appartamento->immagine_appartamento}}" alt="Card image cap">
                </div>

                
                <div class="info-title">
                    <h2>Appartamento affittato da "Nome Utente"</h2>
                    <div class="infos">
                        <span>Metri Quadri: {{$appartamento->metri_quadri}}</span>
                        <span>Stanze: {{$appartamento->numero_stanze}}</span>
                        <span>Letti: {{$appartamento->numero_letti}}</span>
                        <span>Bagni: {{$appartamento->numero_bagni}}</span>
                    </div>
                </div>

                <div class="text-descrizione">
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

                
                <div class="contact-form">
                    {{-- controllo se l'utente è registrato --}}
                    @if (Auth::user())
                        {{-- controllo se l'utente registrato è proprietario dell'appartamento, se non lo è --}}
                        @if ($appartamento->id_proprietario != Auth::user()->id)
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
                        {{-- se lo è, mostro i messaggi ricevuti su questo appartamento --}}
                        <div class="infos-4">
                            <h4>Messaggi Ricevuti per questo appartamento</h4>
                            <section><h5>Email da:</h5></section>
                            <section>
                                <h5>Messaggio:</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa accusantium voluptate cupiditate voluptas voluptates explicabo sunt impedit veniam eaque possimus quisquam iure voluptatem eum exercitationem facilis qui nihil, neque officia?</p>
                            </section>
                        </div>

                    {{-- se l'utente non è registrato, mostro il form per contattare il proprietario --}}
                    @else
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
                </div>

                <div class="infos-maps">
                    <div class="map">
                        <div id="mapid"></div>
                        <input id="id_latitudine" type="hidden" name="" value="{{ $appartamento->latitudine}}">
                        <input id="id_longitudine" type="hidden" name="" value="{{ $appartamento->longitudine}}">
                    </div>
                </div>

                <div class="casella-servizi">
                    <div class="servizi">
                        <h2>Servizi</h2>
                        <ul>
                            @foreach ($servizi as $servizio)
                                <li>{{$servizio->titolo_servizio}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        

            <footer class="third-block-ch">
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

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

        <script src="{{ asset('js/caratteristiche.js') }}" defer></script>
    </body>
</html>