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
                <div class="text-card">
                    <h2>Appartamenti in evidenza:</h2>
                </div>
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
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>