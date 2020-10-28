<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}



        {{-- <header>

            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/gov-logo.png') }}" alt="gov-logo" id="gov-logo">
                </a>

                <div class="loger ml-auto">
                    @guest
                    <a href="{{ route('login') }}" class="log-res">INICIAR SESION</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="log-res" id="register">REGISTRATE</a>
                    @endif
                    @else



                    <div class="dropdown show">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            @if (isset($page) && $page == 'notices')
                                <a class="dropdown-item" href="{{ route('noticias.create') }}">Crear Noticia</a>
                                <a class="dropdown-item" href="#">Editar Noticia</a>
                                <a class="dropdown-item" href="#">Eliminar Noticia</a>
                            @endif
                            <a id="logout" href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Cerrar Sesion</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endguest
                </div>

                <a href="#" id="content-logo">
                    <img src="{{ asset('images/menu.png') }}" alt="logo-menu">
                </a>

                <a href="#" id="content-logo-close" class="desactivate">
                    <img src="{{ asset('images/close.png') }}" alt="logo-close">
                </a>

            </nav>

            <div id="menu">
                <ul class="row mx-auto">
                    <div class="col-lg-8 mx-auto mt-5">
                        <div class="row mx-auto mb-5 text-center">
                            <div class="col-lg-4">
                                <a href="{{ route('noticias.index') }}">
                                    <img src="{{ asset('images/imgp.jpg') }}" alt="imagen">
                                    <span>NOTICIAS</span>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('images/imgp.jpg') }}" alt="imagen">
                                <span>CALENDARIO</span>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('images/imgp.jpg') }}" alt="imagen">
                                <span>CULTURA</span>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('images/imgp.jpg') }}" alt="imagen">
                                <span>DEPORTE</span>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('images/imgp.jpg') }}" alt="imagen">
                                <span>OTRO</span>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('images/imgp.jpg') }}" alt="imagen">
                                <span>OTRO</span>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>

        </header> --}}

        <header>
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/Logos/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-2 mr-auto">
                        <li class="nav-item active">
                            @if (isset($page) && $page == 'welcome')
                                <a class="nav-link active" href="{{ route('main') }}">NOTICIAS</a>
                            @else
                                <a class="nav-link" href="{{ route('main') }}">NOTICIAS</a>
                            @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="culturadropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CULTURA
                            </a>
                            <div class="dropdown-menu" aria-labelledby="culturadropdown">
                                <a class="dropdown-item" href="#">Accion 1</a>
                                <a class="dropdown-item" href="#">Accion 1</a>
                                <a class="dropdown-item" href="#">Accion 1</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="culturadropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                RECREACIÓN Y DEPORTE
                            </a>
                            <div class="dropdown-menu" aria-labelledby="culturadropdown">
                                <a class="dropdown-item" href="#">Accion 1</a>
                                <a class="dropdown-item" href="#">Accion 1</a>
                                <a class="dropdown-item" href="#">Accion 1</a>
                            </div>
                        </li>
                    </ul>

                    @guest
                        <div id="content-botons-register">
                            <a href="{{ route('login') }}" class="btn">INGRRESAR</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn ml-1">REGISTRATE</a>
                            @endif
                        </div>
                    @else

                        <div id="content-botons-register">
                            <a href="{{ route('login') }}" class="btn">{{ Auth::user()->name }}</a>

                            <div class="dropdown d-inline-block" style="padding: 6px 0px">
                                <button class="btn btn-secondary dropdown-toggle" style="border: none; height: 43px;" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ACCIONES
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('noticias.index') }}">Noticias</a>
                                    <a class="dropdown-item" href="{{ route('noticias.create') }}">Crear Noticia</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>

                    @endguest

                    {{-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> --}}
                </div>
            </nav>
        </header>


        <main>
            @yield('content')
        </main>


        {{-- <footer class="page-footer font-small blue pt-5" style="">

            <div class="container-fluid text-center text-md-left" style="max-width: 1111px;">
                <div class="row">

                    <div class="col-md-4" id="footer-img-content">
                        <img src="{{ asset('images/Logos/LOGOHORIZONTAL.png') }}" alt="logovertical">
                    </div>

                    <div class="col-md-3 ml-auto">

                        <h5 class="text-uppercase">ENLACES UTILES</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Iniciar Sesión</a>
                            </li>
                            <li>
                                <a href="#!">Registrate con nosotros</a>
                            </li>
                            <li>
                                <a href="#!">Noticias</a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-md-3">

                        <h5 class="text-uppercase">BUSCAR</h5>

                        <form class="form-inline">
                            <button class="btn" type="submit">
                                <img src="{{ asset('images/icons/search.png') }}" alt="search">
                            </button>
                            <input class="form-control" id="search" type="search" placeholder="Buscar"
                                aria-label="Search">
                        </form>

                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3 mt-5" style="background-color: #04438a; color: white">© 2020
                Copyright:
                <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
            </div>

        </footer> --}}


        <footer>
            <div class="row mx-auto" style="max-width: 1111px">
                <div class="col-lg-4">
                    <div id="imagenlogo">
                        <img src="{{ asset('images/Logos/logo.png') }}" alt="">
                    </div>
                    <div>
                        <h4>ICRDPITALITOHUILA</h4>
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('images/icons/facebook.png') }}" alt="facebook">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('images/icons/instagram.png') }}" alt="instagram">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <img src="{{ asset('images/Logos/regionvive.png') }}" alt="region">
                </div> --}}
                <div class="col-lg-4 ml-auto">
                    <img src="{{ asset('images/Logos/alcaldia.png') }}" alt="alcadia">
                </div>
            </div>
        </footer>

    </div>


    <!-- Footer -->



    <script src="{{ asset('js/bootstrap/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script>
        /* const closeopen = () => {
            document.getElementById('menu').classList.toggle('active')
            $('#content-logo').toggle()
            $('#content-logo-close').toggle()
        }

        $('#content-logo').on('click', function(e) {
            e.preventDefault()
            closeopen()
        })
        $('#content-logo-close').on('click', function(e) {
            e.preventDefault()
            closeopen()
        }) */

    </script>

    @yield('scripts')
</body>

</html>
