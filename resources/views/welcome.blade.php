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
    </head>
    <body>
        <div class="wrapper-page">

            <div class="first-block">
                <header>
                    <nav class="nav-bar">
                        <div class="logo">
                            <button class="btn-logos" type="button" id="button-addon2">
                                <img src="images/bnb-logo.svg" alt="">
                            </button>
                        </div>
                        <div class="text-elements">
                            @if (Route::has('login'))
                                <div class="account">
                                    <button class="btn-account" type="button" id="button-addon2">
                                        <img src="images/account.svg" alt="">
                                    </button>

                                    <div class="drop-menu">
                                        <ul>
                                            @auth
                                                <li> <a href="">Il Mio Profilo</a> </li>
                                                <li> <a href="">Home</a> </li>
                                                @else
                                                    <li> <a href="{{ route('login') }}">Accedi</a> </li>
                                                    <li> <a href="{{ route('register') }}">Registrati</a> </li>
                                            @endauth
                                            
                                            
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </nav>
                </header>
                <div class="jumbo text-center">
                    <h1>Fai volare l'immaginazione</h1>
                    <p>Pianifica un viaggio diverso per scoprire i tesori nascosti vicino a te.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cerca il posto dove ti piacerebbe andare..." aria-label="Cerca il posto dove ti piacerebbe andare..." aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="button-addon2">Cerca</button>
                    </div>
                </div>
            </div>
            
    
            <main class="second-block">
    
                <div class="img-evidence">
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://picsum.photos/id/1059/400/600" alt="some imgae">
                        <div class="info">
                            <h4>Titolo Appartamento</h4>
                            <p>Posizione Appartamento</p>
                        </div>
                    </div>
                    
                </div>
            </main>
    
            <footer class="third-block">
                <div class="wrap-footer">
                    <div class="block1">
                        <ul>
                            <li class="title-footer">Lorem, ipsum dolor sit amet consectetur</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                        </ul>
                    </div>
                    <div class="block2">
                        <ul>
                            <li class="title-footer">Lorem, ipsum dolor sit amet consectetur</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                        </ul>
                    </div>
                    <div class="block3">
                        <ul>
                            <li class="title-footer">Lorem, ipsum dolor sit amet consectetur</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                            <li>Lorem, ipsum dolor sit amet</li>
                        </ul>
                    </div>
                </div>
                <div class="bottom-footer">
                    <section> <i>© 2020 Team7 Boolean, Inc. All rights reserved</i></section>
                </div>
            </footer>
            
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>


@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif