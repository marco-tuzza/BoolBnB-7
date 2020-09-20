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
                    <button class="btn-logos btn-create" type="button" id="button-addon2">
                        <img src="/images/bnb-logo.svg" alt="">
                    </button>
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
                                            <a href="{{ url('/register') }}">
                                                <li id="register">Registrati</li>
                                            </a>
                                            
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
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body card-apartment">
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
    </div>

    <script src="{{ asset('js/welcome.js') }}" defer></script>
</body>
</html>
