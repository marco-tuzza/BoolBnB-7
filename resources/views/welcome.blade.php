<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolBnB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@600;700&family=Raleway:wght@400;500&display=swap" rel="stylesheet">

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
                                                <li> <a href="{{ url('/dashboard') }}">Il Mio Profilo</a> </li>
                                                <li> <a href="{{ url('/messaggi') }}">I Miei Messaggi</a> </li>
                                                <li> <a href="{{ route('apartment.create') }}">Aggiungi Appartamento</a> </li>
                                                <li> <a href="">Home</a> </li>
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
                <div class="jumbo text-center">
                    <div class="hide1">
                        <h1 class="tit">Fai volare l'immaginazione</h1>
                    </div>
                    <div class="hide2">
                        <p class="tit2">Pianifica un viaggio diverso per scoprire i tesori nascosti vicino a te.</p>
                    </div>
                </div>
                <div class="input-group input-an mb-3">
                    <input type="text" class="form-control" id="address-input" placeholder="Cerca il posto dove ti piacerebbe andare..." aria-label="Cerca il posto dove ti piacerebbe andare..." aria-describedby="button-addon2">
                    <div class="search-filter">
                        <div class="butt">
                            <button class="btn btn-primary search" type="button" id="button-addon2">Cerca</button>
                        </div>
                        <div class="filtri-uno">
                            <div class="filter">
                                <select name="numero_stanze" id="numerostanze" class="custom-select">
                                    <option value="1">Stanze - 1</option>
                                    <option value="2">Stanze - 2</option>
                                    <option value="3">Stanze - 3</option>
                                    <option value="4">Stanze - 4</option>
                                    <option value="5">Stanze - 5</option>
                                    <option value="6">Stanze - 6</option>
                                    <option value="7">Stanze - 7</option>
                                    <option value="8">Stanze - 8</option>
                                    <option value="9">Stanze - 9</option>
                                    <option value="10">Stanze - 10</option>
                                </select>
                            </div>
                            <div class="filter">
                                <select name="numero_letti" id="numeroletti" class="custom-select">
                                    <option value="1">Letti - 1</option>
                                    <option value="2">Letti - 2</option>
                                    <option value="3">Letti - 3</option>
                                    <option value="4">Letti - 4</option>
                                    <option value="5">Letti - 5</option>
                                    <option value="6">Letti - 6</option>
                                    <option value="7">Letti - 7</option>
                                    <option value="8">Letti - 8</option>
                                    <option value="9">Letti - 9</option>
                                    <option value="10">Letti - 10</option>
                                </select>
                            </div>

                            <div class="filter">
                                <select class="custom-select" id="distanza">
                                    <option selected value="0.2">Distanza - 20km</option>
                                    <option value="0.4">40km</option>
                                    <option value="0.6">60km</option>
                                    <option value="0.8">80km</option>
                                </select>
                            </div>
                        </div>

                        <div class="checkbox">
                            <label for="wifi" class="input-group-text check-label">
                                <input class="check-input" type="checkbox" name="WiFi" value="1">
                                <h6>WiFi</h6>
                            </label>
                            <label for="posto-macchina" class="input-group-text check-label">
                                <input class="check-input" type="checkbox" name="Posto Macchina" value="2">
                                <h6>Posto Macchina</h6>
                            </label>
                            <label for="piscina" class="input-group-text check-label">
                                <input class="check-input" type="checkbox" name="Piscina" value="3">
                                <h6>Piscina</h6>
                            </label>
                            <label for="portineria" class="input-group-text check-label">
                                <input class="check-input" type="checkbox" name="Portineria" value="4">
                                <h6>Portineria</h6>
                            </label>
                            <label for="sauna" class="input-group-text check-label">
                                <input class="check-input" type="checkbox" name="Sauna" value="5">
                                <h6>Sauna</h6>
                            </label>
                            <label for="vista-mare" class="input-group-text check-label">
                                <input class="check-input" type="checkbox" name="Vista Mare" value="6">
                                <h6>Vista Mare</h6>
                            </label>
                        </div>
                    </div>
                </div>

                
            </div>


            <main class="second-block">
                <div class="text-card">
                    <h2>Appartamenti in evidenza:</h2>
                </div>
                <div class="img-evidence">
                    <h4 class="no-results non-visible">Nessun appartamento trovato..prova ad aumentare la distanza o a cambiare città! :)</h4>
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
                        <img src="images/close.svg" alt="close" class="close tl1">
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
                        <img src="images/close.svg" alt="close" class="close tl2">
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
                                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data di Nascita') }}</label>

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
                <a href="#"></a>
            </div>

        </div>

        <script id="card-template" type="text/x-handlebars-template">
            <div class="card">
                <a href="/caratteristiche/@{{ id }}" target="_blank">
                    <img src="@{{{ imm }}}" class="poster" alt="@{{ titolo }}">
                    <div class="info">
                        <h4>@{{ titolo }}</h4>
                        @{{{ servizi }}}
                    </div>
                </a>
            </div>
        </script>

        <script id="card-template-2" type="text/x-handlebars-template">
            <div class="card sponsorized">
                <a href="/caratteristiche/@{{ id }}" target="_blank">
                    <img src="@{{{ imm }}}" class="poster" alt="@{{ titolo }}">
                    <div class="info">
                        <h4>@{{ titolo }}</h4>
                        @{{{ servizi }}}
                    </div>
                    <div class="star">
                        <h4> <i>Appartamento in evidenza</i> </h4>
                    </div>
                </a>
            </div>
        </script>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" crossorigin="anonymous"></script>

        <script src="{{ asset('js/welcome.js') }}" defer></script>
    </body>
</html>

