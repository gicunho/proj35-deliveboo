<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Glory:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css " integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w== " crossorigin="anonymous"/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" >
                    {{ config('app.name', 'Laravel') }}
                </a>

                {{-- @if (Route::currentRouteName() == 'restaurants')
                    <div class="searchbar">
                        <form @submit.prevent="view">
                            <input id="search-focus" type="search" id="form1" placeholder="Cerca"
                                v-model="search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                @endif --}}

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown border rounded">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right drop-down-user"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">
                                        Profilo
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 position-relative">
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6  mb-3 footer_card">
                        <div class="container">
                            <h4>Scopri Deliveboo</h4>
                            <span>Investitori</span>
                            <span>Chi siamo</span>
                            <span>Ristoranti</span>
                            <span>Altro</span>
                            <span>Il nostro blog</span>
                            <span>Programmazione</span>
                            <span>Design</span>
                            <span>Lavora con noi</span>
                            <span>Diventa nostro partner</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-3 footer_card">
                        <div class="container">
                            <h4>Note Legali</h4>
                            <span>Termini & Condizioni</span>
                            <span>Informativa sulla privacy</span>
                            <span>Coockies</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-3 footer_card">
                        <div class="container">
                            <h4>Aiuto</h4>
                            <span>Contatti</span>
                            <span>FAQ</span>
                            <span>Tipi di cucina</span>
                            <span>Mappa del sito</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-3 footer_card">
                        <div class="container">
                            <h4>Porta Deliveboo con te</h4>
                            <div class="store">
                                <i class="fab fa-apple" style="font-size: 30px"></i>
                                <div>
                                    <h6>Scarica su</h6>
                                    <h5>App Store</h5>
                                </div>
                            </div>
                            <div class="store">
                                <i class="fab fa-google-play"></i>
                                <div>
                                    <h6>DISPONIBILE SU</h6>

                                    <h5>Google Play</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <div class="icon">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                        </div>

                        <div class="copyright d-flex align-items-center">
                            <i class="far fa-copyright"></i>
                            <span>2021 Deliveboo</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    {{-- CDN Vue.js --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

    {{-- CDN Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</body>

</html>
