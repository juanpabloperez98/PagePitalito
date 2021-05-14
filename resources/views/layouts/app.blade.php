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
                                        {{-- @php
                                            $deportes = App\Deporte::orderBy('id', 'asc')->get();
                                        @endphp

                                        @foreach ($deportes as $deporte)
                                            <a href="{{ route('deportes.show',$deporte->id) }}">{{ $deporte->name }}</a>
                                        @endforeach --}}
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
                            </ul>
                        </li>
                        {{-- CALENDARIO --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">CALENDARIO</a>
                        </li> --}}
                        {{-- CONVOCATORIAS --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">CONVOCATORIAS</a>
                        </li> --}}
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
                        <a href="{{ route('login') }}" class="btn">{{ Auth::user()->first_name }}</a>
                        @role('admin')
                            <a href="{{ route('acciones') }}" class="btn">ACCIONES</a>
                        @endrole
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- Submenu img --}}
    <script>
    </script>
    @yield('scripts')
</body>

</html>