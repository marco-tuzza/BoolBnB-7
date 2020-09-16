<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolBnB - Pagamenti</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Raleway:wght@400;500&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                    <button class="btn-account" type="button" id="button-addon2">
                                        <img src="images/account.svg" alt="">
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
                    <div class="card-header text-center">
                        <h2>Sponsorizza Appartamento "Qua va l'id o il titolo Appartamento":</h2>
                    </div>
                </div>
                <div class="img-apartment">
                    @if (session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>Scegli il tipo di Sponsorizzazione</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Base:</h5>
                            <input type="radio">
                            <p class="card-text">2,99€</p>
                            <h5 class="card-title">Plus(Consigliato):</h5>
                            <input type="radio">
                            <p class="card-text">5,99€</p>
                            <h5 class="card-title">Pro:</h5>
                            <input type="radio">
                            <p class="card-text">7,99€</p>
                        </div>
                        <button class="button" type="submit"><span>Scegli</span></button>
                    </div>
                    <form method="post" id="payment-form" action="{{ url('/checkout') }}">
                        @csrf
                        <section>
                            <label for="amount">
                                <span class="input-label">Totale</span>
                                <div class="input-wrapper amount-wrapper">
                                    <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
                                </div>
                            </label>
                            <div class="bt-drop-in-wrapper">
                                <div id="bt-dropin"></div>
                            </div>
                        </section>
                        <input id="nonce" name="payment_method_nonce" type="hidden" />
                        <button class="button" type="submit"><span>Paga!</span></button>
                    </form>
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

        </div>

        <script src="https://js.braintreegateway.com/web/dropin/1.23.0/js/dropin.min.js"></script>
        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{$token}}";

            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
                // paypal: {
                //     flow: 'vault'
                // }
            }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }

                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                    });
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

        <script src="{{ asset('js/pagamenti.js') }}" defer></script>
    </body>
</html>
