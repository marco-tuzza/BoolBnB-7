<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolBnB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper-dashboard">

            <div class="wrapper-dashboard">
                <div class="block-header-dash">
                    <header>
                        <nav class="nav-bar">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <button class="btn-logos btn-create" type="button" id="button-addon2">
                                    <img src="../images/bnb-logo.svg" alt="">
                                </button></a>
                            </div>
                            <div class="text-elements">
                                @if (Route::has('login'))
                                    <div class="account">
                                        <button class="btn-account btn-create" type="button" id="button-addon2">
                                            <img src="../images/account.svg" alt="">
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
                                                        {{-- <li id="login"> <a href="{{ route('login') }}">Accedi</a> </li> --}}
                                                        <li id="register">Registrati</li>
                                                @endauth
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                        </nav>
                    </header>
                </div>

            <div class="block-center-dash">
                <div class="text-dash">
                    <div class="title-dash text-center">
                        <h2>Statische "{{$appartamento->titolo_appartamento}}":</h2>
                    </div>
                </div>
                <div class="img-apartment stats">
                    <div class="stat">
                        <div class="text-stat text-center">
                            <h4>Visualizzazioni totali</h4>
                        </div>
                        <div class="grafico">
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>

                    <div class="stat">
                        <div class="text-stat text-center">
                            <h4>Statistiche Messaggi</h4>
                        </div>
                        <div class="grafico">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>

                <div class="img-apartment stats">
                    <div class="stat">
                        <div class="grafico">
                            <canvas id="myChart1a"></canvas>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="grafico">
                            <canvas id="myChart2a"></canvas>
                        </div>
                    </div>
                </div>
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

        <input id="id-apartment" name="id-apartment" value="{{$appartamento->id}}" type="hidden" />

        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

        <script src="{{ asset('js/stats.js') }}" defer></script>
    </body>
</html>