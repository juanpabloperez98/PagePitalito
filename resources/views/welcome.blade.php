@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    <div class="banner">
        <h1>Instituto de Cultura Recreación y Deporte Pitalito Huila</h1>
        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('images/videos/video.mp4') }}" type="video/mp4">
        </video>
    </div>

    <section>
        <div class="row mx-auto" id="contenido">
            <div class="col-lg-12" id="formcontrol">
                <h3>¿Que deseas buscar?</h3>
                <form class="form-inline">
                    <button class="btn" type="submit">
                        <img src="{{ asset('images/icons/search.png') }}" alt="search">
                    </button>
                    <input class="form-control" id="search" type="search" placeholder="Buscar" aria-label="Search">
                </form>
            </div>
        </div>

        <div id="caroulsel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/imagenp1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/imagenp2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/imagenp3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev arrow" href="#caroulsel1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next arrow" href="#caroulsel1" role="button" data-slide="next">
                <span class="carousel-control-next-icon icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="row mx-auto" id="main-part">
            <div class="col-lg-12">
                <h2>INICIO</h2>
                <div class="row mx-auto">
                    <div class="col-lg-6">
                        <img src="{{ asset('images/imagen_prueba_1.png') }}" alt="imagen_prueba">
                    </div>
                    <div class="col-lg-6">
                        <div id="caroulsel2" class="carousel slide" style="height: 100%" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row mx-auto contenedor">
                                        <div class="col-lg-12">
                                            <span>
                                                <img src="{{ asset('images/icons/fijado.png') }}" alt="icono-fijado">
                                                Destacado
                                            </span>
                                            <h3>08 Octubre Dia del Profesor de Educación Física</h3>
                                            <span style="display: block" class="time-published">Noticia - haces 3
                                                días</span>
                                            <a href="#">Participa</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row mx-auto contenedor">
                                        <div class="col-lg-12">
                                            <span>
                                                <img src="{{ asset('images/icons/fijado.png') }}" alt="icono-fijado">
                                                Destacado
                                            </span>
                                            <h3>31 Octubre Dia de los niños pitalito</h3>
                                            <span style="display: block" class="time-published">Noticia - haces 10
                                                días</span>
                                            <a href="#">Participa</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row mx-auto contenedor">
                                        <div class="col-lg-12">
                                            <span>
                                                <img src="{{ asset('images/icons/fijado.png') }}" alt="icono-fijado">
                                                Destacado
                                            </span>
                                            <h3>01 Noviembre Fiestas de pitalito</h3>
                                            <span style="display: block" class="time-published">Noticia - haces 7
                                                días</span>
                                            <a href="#">Participa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev arrow" id="seconds-arrow" href="#caroulsel2" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next arrow" id="seconds-arrow" href="#caroulsel2" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



            {{-- Noticias --}}
            {{-- <div class="col-lg-12" id="notices">
                <div class="row mx-auto content-notices">
                    <div class="col-lg-4" id="filter-content">
                        <span>Filtar por: </span>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filtros
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>



@endsection



{{-- @section('styles')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection --}}


{{-- @if (Route::has('login'))
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
@endif --}}
