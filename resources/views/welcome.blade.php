@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    {{-- MAIN --}}
    <div class="row mx-auto" id="main-section">
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
    </div>

    {{-- DESCUBRE --}}
    <div class="row mx-auto" id="places-section">
        <div style="max-width: 1111px" class="mx-auto">
            <div class="row mx-auto">
                <div class="col-lg-12" style="margin-bottom: 60px">
                    <h1>
                        DESCUBRE LOS 5 LUGARES MÁS
                        REPRESENTATIVOS DE PITALITO.
                    </h1>
                    <p>
                        Pueblos que te conectan con la naturaleza y la cultura, museos de ciencia que son galerias urbanas.
                    </p>
                </div>

                <div class="col-lg-5 imagen-pruebas" style="height: 425px;">
                    <div style="margin-top: 339px">
                        <h3>
                            CENTRO ADMINISTRATIVO LA CHAPOLERA
                        </h3>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row mx-auto">
                        <div class="col-lg-5 imagen-pruebasshort">
                            <h3>
                                CENTRO CULTURAL HÉCTOR POLANIA SÁNCHEZ
                            </h3>
                        </div>
                        <div class="col-lg-5 ml-lg-4 imagen-pruebasshort">
                            <h3>
                                COLISEO CUBIERTO
                                DE PITALITO.
                            </h3>
                        </div>
                        <div class="col-lg-5 mt-lg-4 imagen-pruebasshort">
                            <h3>
                                PARQUE PRINCIPAL JOSÉ HILARIO
                                LOPEZ
                            </h3>
                        </div>
                        <div class="col-lg-5 ml-lg-4 mt-lg-4 imagen-pruebasshort">
                            <h3>
                                VILLA
                                OLIMPICA
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Noticias --}}
    <div class="row mx-auto" id="notices-section">
        <div style="max-width: 1111px" class="mx-auto">
            <div class="row mx-auto">
                <div class="col-lg-12" style="padding: 0px">
                    <h1>NOTICIAS</h1>
                    <p>La mejor información en eventos culturales y deportivos que se desarrollan en el municipio, así como
                        tambien
                        eventos liderados desde el Instituto de Cultura, Recreación y Deporte de Pitalito.</p>
                </div>
                <div class="col-lg-12" style="padding: 0px">
                    <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                        <div class="carousel-inner">



                            {{-- @php
                            $con = 0;
                            $var = sizeof($noticias);
                            $result = $con%3;
                            @endphp --}}



                            {{-- @while ($con != $var)


                                @php
                                $result = $con
                                @endphp



                                <div class="carousel-item">
                                    <div class="row mx-auto" id="row-notices">
                                        <div class="col-lg-4 text-center" style="padding: 10px">
                                            <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100"
                                                alt="...">
                                            <h3>TITULO</h3>
                                            <p>ENCABEZADO</p>
                                        </div>
                                        <div class="col-lg-4 text-center" style="padding: 10px">
                                            <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100"
                                                alt="...">
                                            <h3>TITULO</h3>
                                            <p>ENCABEZADO</p>
                                        </div>
                                        <div class="col-lg-4 text-center" style="padding: 10px">
                                            <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100"
                                                alt="...">
                                            <h3>TITULO</h3>
                                            <p>ENCABEZADO</p>
                                        </div>
                                    </div>
                                </div>



                                $con ++;



                            @endwhile --}}

                            @php
                            $init = 0;
                            @endphp

                            @foreach ($noticias as $noticia)

                                @if ($init == 0)
                                    <div class="carousel-item active">
                                        <div class="row mx-auto" id="row-notices">
                                            <div class="col-lg-6 mx-auto text-center" style="padding: 10px">
                                                @if (Storage::disk('images')->has($noticia->file))
                                                    <img src="{{ url('/imagen/' . $noticia->file) }}" class="d-block w-100"
                                                        alt="...">
                                                @else
                                                    <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100"
                                                        alt="...">
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
                                                @if (Storage::disk('images')->has($noticia->file))
                                                    <img src="{{ url('/imagen/' . $noticia->file) }}" class="d-block w-100"
                                                        alt="...">
                                                @else
                                                    <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100"
                                                        alt="...">
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
                            {{-- <div class="carousel-item">
                                <div class="row mx-auto" id="row-notices">
                                    <div class="col-lg-4 text-center" style="padding: 10px">
                                        <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100" alt="...">
                                        <h3>TITULO</h3>
                                        <p>ENCABEZADO</p>
                                    </div>
                                    <div class="col-lg-4 text-center" style="padding: 10px">
                                        <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100" alt="...">
                                        <h3>TITULO</h3>
                                        <p>ENCABEZADO</p>
                                    </div>
                                    <div class="col-lg-4 text-center" style="padding: 10px">
                                        <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100" alt="...">
                                        <h3>TITULO</h3>
                                        <p>ENCABEZADO</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row mx-auto" id="row-notices">
                                    <div class="col-lg-4 text-center" style="padding: 10px">
                                        <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100" alt="...">
                                        <h3>TITULO</h3>
                                        <p>ENCABEZADO</p>
                                    </div>
                                    <div class="col-lg-4 text-center" style="padding: 10px">
                                        <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100" alt="...">
                                        <h3>TITULO</h3>
                                        <p>ENCABEZADO</p>
                                    </div>
                                    <div class="col-lg-4 text-center" style="padding: 10px">
                                        <img src="{{ asset('images/main-section.jpg') }}" class="d-block w-100" alt="...">
                                        <h3>TITULO</h3>
                                        <p>ENCABEZADO</p>
                                    </div>
                                </div>
                            </div> --}}
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
                </div>
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
