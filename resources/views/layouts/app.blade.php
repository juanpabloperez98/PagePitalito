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
    {{-- Scripts --}}
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
                <a class="navbar-brand" href="{{ route('main') }}">
                    <img src="{{ asset('images/Logos/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- Barra de Navegación --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-2 mr-auto">
                        {{-- NOTICIAS --}}
                        <li class="nav-item active">
                            <a class="nav-link" id="notice_link" href="{{ url('/#notices-section') }}">NOTICIAS</a>
                        </li>
                        {{-- CULTURA --}}
                        <li class="nav-item dropdown_self">
                            <a href="" class="nav-link dropbtn" id="" onclick="event.preventDefault();">
                                CULTURA
                                <img class="ml-lg-2" src="{{ asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                            </a>
                            <ul class="dropdown-content">
                                {{-- Formación Artistica --}}
                                <li class="subdropdown_self">
                                    <a href="#" class="dropbtn" class="submenu" id="submenu">Escuelas Formación Artística
                                        <img class="ml-lg-2" src="{{ asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                                    </a>
                                    <ul class="subdropdown-content">
                                        <a href="#">Música</a>
                                        <a href="#">Teatro</a>
                                        <a href="#">Danza</a>
                                        <a href="#">Artes Plásticas</a>
                                    </ul>
                                </li>
                                {{-- Infraestructura Cultural --}}
                                <li>
                                    <a href="#">Infraestructura Cultural</a>
                                </li>
                                {{-- Patrimonio Cultural --}}
                                <li class="subdropdown_self">
                                    <a href="#" class="dropbtn" class="submenu" id="submenu" onclick="event.preventDefault();">Patrimonio Cultural
                                        <img class="ml-lg-2" src="{{ asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                                    </a>
                                    <ul class="subdropdown-content">
                                        <a href="#">Material</a>
                                        <a href="#">Inmaterial</a>
                                    </ul>
                                </li>
                                {{-- Agenda Cultural --}}
                                <li>
                                    <a href="#">Agenda Cultural</a>
                                </li>
                            </ul>
                        </li>
                        {{-- DEPORTE --}}
                        <li class="nav-item dropdown_self">
                            @if (isset($page)  && $page == "deportes")
                                <a href="#" class="nav-link dropbtn active" onclick="event.preventDefault();">
                                    DEPORTE
                                    <img class="ml-lg-2" src="{{ asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                                </a>    
                            @else
                                <a href="#" class="nav-link dropbtn" onclick="event.preventDefault();">
                                    DEPORTE
                                    <img class="ml-lg-2" src="{{ asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                                </a> 
                            @endif
                            
                            <ul class="dropdown-content">
                                {{-- Formación Deportiva --}}
                                <li class="subdropdown_self">
                                    <a href="{{ url('/deportes')}}" class="dropbtn" class="submenu" id="submenu" >Escuelas Formación Deportiva
                                        <img class="ml-lg-2" src="{{asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                                    </a>
                                    <ul class="subdropdown-content" style="height: 80vh">
                                        {{--  Ejemplo de Ruta: url('/FormacionDeportiva/ajedrez') --}}
                                        <a href="{{ route('deportes.show',1) }}">Ajedrez</a>
                                        <a href="{{ route('deportes.show',2) }}">Atletismo</a>
                                        <a href="{{ route('deportes.show',3) }}">Baloncesto</a>
                                        <a href="{{ route('deportes.show',4) }}">Ciclismo</a>
                                        <a href="{{ route('deportes.show',5) }}">Discapacidad</a>
                                        <a href="{{ route('deportes.show',6) }}">Fútbol</a>
                                        <a href="{{ route('deportes.show',7) }}">Fútbol de Salón</a>
                                        <a href="{{ route('deportes.show',8) }}">Gimnasia y Porrismo</a>
                                        <a href="{{ route('deportes.show',9) }}">Lucha</a>
                                        <a href="{{ route('deportes.show',10) }}">Natación</a>
                                        <a href="{{ route('deportes.show',11) }}">Patinaje</a>
                                        <a href="{{ route('deportes.show',12) }}">Taekwondo</a>
                                        <a href="{{ route('deportes.show',13) }}">Tenis de Campo</a>
                                        <a href="{{ route('deportes.show',14) }}">Tenis de Mesa</a>
                                        <a href="{{ route('deportes.show',15) }}">Voleibol</a>
                                    </ul>
                                </li>
                                {{-- Actividad Física, Laboyano Activo y Saludable --}}
                                <li class="subdropdown_self">
                                    <a href="#" class="dropbtn" class="submenu" id="submenu" onclick="event.preventDefault();">Actividad Física, Laboyano Activo y Saludable
                                        <img class="ml-lg-2" src="{{ asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                                    </a>
                                    <ul class="subdropdown-content">
                                        <a href="#">Actividad Física Musicalizada</a>
                                        <a href="#">Vías Activas y Saludables</a>
                                    </ul>
                                </li>
                                {{-- Deporte Social Comunitario --}}
                                <li>
                                    <a href="#">Deporte Social Comunitario</a>
                                </li>
                                {{-- Clubes Deportivos --}}
                                <li>
                                    <a href="#">Clubes Deportivos</a>
                                </li>
                                {{-- Infraestructura Deportiva --}}
                                <li class="subdropdown_self">
                                    <a href="#" class="dropbtn" class="submenu" id="submenu" onclick="event.preventDefault();">Infraestructura Deportiva
                                        <img class="ml-lg-2" src="{{ asset('images/icons/drop-down-arrow24.png') }}" alt="" style="width: 12px;">
                                    </a>
                                    <ul class="subdropdown-content">
                                        <a href="#">Comuna 1</a>
                                        <a href="#">Comuna 2</a>
                                        <a href="#">Comuna 3</a>
                                        <a href="#">Comuna 4</a>
                                    </ul>
                                </li>
                                {{-- Agenda Deportiva --}}
                                <li>
                                    <a href="#">Agenda Deportiva</a>
                                </li>
                            </ul>
                        </li>
                        {{-- CALENDARIO --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">CALENDARIO</a>
                        </li>
                        {{-- CONVOCATORIAS --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONVOCATORIAS</a>
                        </li>
                    </ul>

                @guest
                    <div id="content-botons-register">
                        <a href="{{ route('login') }}" class="btn">INGRESAR</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn ml-1">REGISTRATE</a>
                        @endif
                    </div>
                @else
                    <div id="content-botons-register">
                        <a href="{{ route('login') }}" class="btn">{{ Auth::user()->name }}</a>

                        {{-- @if ($page == 'notices')
                            --}}
                            <div class="dropdown d-inline-block" style="padding: 6px 0px">
                                <button class="btn btn-secondary dropdown-toggle" style="border: none; height: 43px;"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    ACCIONES
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('noticias.index') }}">Noticias</a>
                                    <a class="dropdown-item" href="{{ route('noticias.create') }}">Crear Noticia</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div> --}}
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('deportes.index') }}">Deportes</a>
                                    <a class="dropdown-item" href="{{ route('deportes.create') }}">Crear deportes</a>
                                    {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                                </div>
                            </div>
                            {{-- @elseif($page == 'deportes') --}}
                            {{-- <div class="dropdown d-inline-block"
                                style="padding: 6px 0px">
                                <button class="btn btn-secondary dropdown-toggle" style="border: none; height: 43px;"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    ACCIONES
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('noticias.index') }}">Deportes</a>
                                    <a class="dropdown-item" href="{{ route('noticias.create') }}">Crear Deporte</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div> --}}
                            {{--
                        @endif --}}
                    </div>
                @endguest

    </div>
    </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
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
                            <a href="https://www.facebook.com/icrdpitalitohuila">
                                <img src="{{ asset('images/icons/facebook.png') }}" alt="Facebook ICRD" class="mr-3">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/icrdpitalito/">
                                <img src="{{ asset('images/icons/instagram.png') }}" alt="Instagram ICRD" class="mr-3">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCW2Wa3V93NgQpUSjT9mcyOg?view_as=subscriber">
                                <img src="{{ asset('images/icons/youtube.png') }}" alt="Youtube ICRD" class="mr-3">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Logos Footer -->
            <div class="col-lg-4 ml-auto">
                <img src="{{ asset('images/Logos/alcaldia.png') }}" alt="Alcadía Municipal">
            </div>
        </div>
    </footer>
    </div>

    <!-- Footer -->
    <script src="{{ asset('js/bootstrap/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    {{-- Submenu img --}}
    <script>
    </script>
    @yield('scripts')
</body>

</html>