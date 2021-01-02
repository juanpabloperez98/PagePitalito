@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    {{-- MAIN --}}
    {{-- <div class="row mx-auto" id="main-section">
        <div class="row mx-auto" style="max-width: 1111px" id="content">
            <div class="col-lg-7">
                <div id="contain-title">
                    <h1>INSTITUTO DE CULTURA RECREACIÓN Y DEPORTE PITALITO HUILA</h1>
                </div>
                <div id="btn-vermas">
                    <a href="#" class="btn">VER MÁS</a>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row mx-auto" id="video-content">
        <video autoplay="autoplay" loop="loop" id="video_background" preload="auto" muted>
            <source src="{{ asset('images/videos/video2.mp4') }}" type="video/mp4">
        </video>
        <div class="text">
            <h1>INSTITUTO DE CULTURA RECREACIÓN Y DEPORTE PITALITO HUILA</h1>
            <div id="btn-vermas">
                <a href="{{ route('vermas') }}" class="btn">VER MÁS</a>
            </div>
        </div>
    </div>
    {{-- DESCUBRE --}}
    <div class="row mx-auto" id="places-section">
        <div style="max-width: 1111px" class="mx-auto mt-5">
            <div class="row mx-auto mt-5">
                <div class="col-lg-12" style="margin-bottom: 60px">
                    <h1>
                        DESCUBRE LOS 5 LUGARES MÁS
                        REPRESENTATIVOS DE PITALITO.
                    </h1>
                    <p>
                        Pueblos que te conectan con la naturaleza y la cultura, museos de ciencia que son galerias urbanas.
                    </p>
                </div>

                <div class="col-lg-5 mb-5 imagen-pruebas" style="height: 425px;">
                    <img class="" src="{{ asset('images/Lugares/Chapolera.png') }}" style="height:100%; width:100%">
                    <div style="margin-top: 0px">
                        <h3>
                            CENTRO ADMINISTRATIVO LA CHAPOLERA
                        </h3>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row mx-auto">
                        <div class="col-lg-5 imagen-pruebasshort">
                            <img class="" src="{{ asset('images/Lugares/CentroCultural.jpg') }}" style="height:80%; width:100%">
                            <h3>
                                CENTRO CULTURAL HÉCTOR POLANIA SÁNCHEZ
                            </h3>
                        </div>
                        <div class="col-lg-5 ml-lg-4 imagen-pruebasshort">
                            <img class="" src="{{ asset('images/Lugares/ColiseoPitalito.jpg') }}" style="height:80%; width:100%">
                            <h3>
                                COLISEO CUBIERTO
                                DE PITALITO.
                            </h3>
                        </div>
                        <div class="col-lg-5 mt-lg-5 imagen-pruebasshort">
                            <img class="" src="{{ asset('images/Lugares/ParquePrincipal.jpg') }}" style="height:80%; width:100%">
                            <h3>
                                PARQUE PRINCIPAL JOSÉ HILARIO
                                LOPEZ
                            </h3>
                        </div>
                        <div class="col-lg-5 ml-lg-4 mt-lg-5 imagen-pruebasshort">
                            <img class="" src="{{ asset('images/Lugares/VillaOlimpica.jpg') }}" style="height:80%; width:100%">
                            <h3>
                                VILLA<br>
                                OLIMPICA
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Noticias --}}
    <div class="row mx-auto" style="max-width: 1111px" id="notices-section">
        <div style="max-width: 1111px" class="mx-auto">
            <div class="row mx-auto">
                <div class="col-lg-12" style="padding: 0px">
                    <h1>NOTICIAS</h1>
                    <p>La mejor información en eventos culturales y deportivos que se desarrollan en el municipio, así como
                        tambien
                        eventos liderados desde el Instituto de Cultura, Recreación y Deporte de Pitalito.</p>
                </div>
                @if (sizeof($noticias) > 0)
                    <div class="col-lg-12" style="padding: 0px">
                        <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                            <div class="carousel-inner">
                                @php
                                $init = 0;
                                @endphp

                                @foreach ($noticias as $noticia)

                                    @if ($init == 0)
                                        <div class="carousel-item active">
                                            <div class="row mx-auto" id="row-notices">
                                                <div class="col-lg-6 mx-auto text-center" style="padding: 10px">
                                                    @if (Storage::disk('notices_images')->has($noticia->file))
                                                        <img src="{{ url('/imagen/' . $noticia->file) }}"
                                                            class="d-block w-100" alt="...">
                                                    @else
                                                        <img src="{{ asset('images/main-section.jpg') }}"
                                                            class="d-block w-100" alt="...">
                                                    @endif
                                                    <a href="{{ route('noticias.show', $noticia->id) }}">
                                                        <h3>{{ $noticia->name }}</h3>
                                                    </a>
                                                    {{-- <p> {!! $noticia->excerpt !!}</p>
                                                    --}}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <div class="row mx-auto" id="row-notices">
                                                <div class="col-lg-6 mx-auto text-center" style="padding: 10px">
                                                    @if (Storage::disk('notices_images')->has($noticia->file))
                                                        <img src="{{ url('/imagen/' . $noticia->file) }}"
                                                            class="d-block w-100" alt="...">
                                                    @else
                                                        <img src="{{ asset('images/main-section.jpg') }}"
                                                            class="d-block w-100" alt="...">
                                                    @endif
                                                    <a href="{{ route('noticias.show', $noticia->id) }}">
                                                        <h3>{{ $noticia->name }}</h3>
                                                    </a>
                                                    {{-- <div>
                                                        {!! $noticia->excerpt !!}
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @php
                                    $init ++;
                                    @endphp

                                @endforeach

                            </div>
                            <a class="carousel-control-prev arrows" {{-- style="left: -60px;"
                                --}} href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next arrows" {{-- style="right: -60px;"
                                --}} href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @guest
                            <div class="boton text-center mt-3">
                                <a href="{{ route('show-notices-user') }}" class="btn btn-primary">Ver todas las noticias</a>
                            </div>
                        @endguest
                    </div>
                @else
                    <div class="col-lg-12" style="padding: 0px" id="no-notices">
                        <p>
                            No hay noticias creadas
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- SUSCRIBETE --}}
    <div style="margin-top: 80px" id="suscribete-container">
        <div class="row mx-auto" style="max-width: 1111px" id="suscribete-section">
            <div class="col-lg-6 content-mesaje" style="border-left: 10px solid white">
                <h1>PITALITO ESPERA POR TI SUSCRÍBETE Y
                    RECIBE NOTICIAS, INVITACIÓN A EVENTOS
                    DEPORTIVOS Y CULTURALES.</h1>
            </div>
            <div class="col-lg-6 content-mesaje" id="form-content">
                <h3>¡SI!, QUIERO A PITALITO.</h3>
                <form class="content-search form-inline">
                    <input type="email" class="form-control" placeholder="CORREO ELECTRONICO" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <button type="submit" class="">
                        <img src="{{ asset('images/icons/mail.png') }}" alt="imagen">
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        if ($(window).scrollTop() >= 1217 && $(window).scrollTop() <= 1683) {
            $('#notice_link').addClass('active')
        } else {
            $('#notice_link').removeClass('active')
        }

        $(window).scroll(() => {
            if ($(window).scrollTop() >= 1217 && $(window).scrollTop() <= 1683) {
                $('#notice_link').addClass('active')
            } else {
                $('#notice_link').removeClass('active')
            }
            console.log($(window).scrollTop())
        })
    </script>
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
