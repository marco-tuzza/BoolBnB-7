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
        <div class="wrapper-page-caratteristiche">

            <div class="first-block">
                <header>
                    <nav class="nav-bar">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <button class="btn-logos" type="button" id="button-addon2">
                                <img src="images/bnb-logo.svg" alt="">
                            </button></a>
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
                    <h1>Appartamenti dell'utente</h1>
                    <div class="card-container-dashboard">
                    </div>
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

        <script id="templatecard_dashboard" type="text/x-handlebars-template">
            <div class="card-dashboard" style="width: 18rem;">
                <img class="card-img-top" src=" {{ asset('images/stanza.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">@{{primoparametro}}</h5>
                    <p class="card-text">@{{secondoparametro}} dell'appartamento per l'host</p>
                    <a href="#" class="btn btn-primary">@{{terzoparametro}}</a>
                </div>
            </div>
        </script>

        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

        <script src="{{ asset('js/dashboard.js') }}" defer></script>
    </body>
</html>
