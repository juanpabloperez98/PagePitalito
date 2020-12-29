@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/deportes/index.css') }}">
@endsection


@section('content')
    <div class="" id="content-heading">
        <div class="row mx-auto bg-success" id="imagen-presentation">
            <h3>ESCUELAS DE FORMACIÓN DEPORTIVA</h3>
        </div>        
    </div>
    <div class="row mx-auto p-lg-4">
        <div class="col-lg-12 col-12">
            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                  {{-- 3 items --}}
                  <div class="carousel-item active text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Ajedrez.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',1) }}"><h3>Ajedrez</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Atletismo.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Atletismo</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Baloncesto.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Baloncesto</h3></a>
                    </div>
                  </div>
                  {{-- 3 items --}}
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Ciclismo.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Ciclismo</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Discapacidad.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Discapacidad</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Futbol.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Fútbol</h3></a>
                    </div>
                  </div>
                  {{-- 3 items --}}
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/FutbolDeSalon.png') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Fútbol de Salón</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Gimnasia.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Gimnasia y Porrismo</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Lucha.jpg') }}" style="max-width:100%; height:250px"></div>
                        <a href=""><h3>Lucha</h3></a>
                    </div>
                  </div>
                  {{-- 3 items --}}
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Natacion.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Natación</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Patinaje.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Patinaje</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Taekwondo.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Taekwondo</h3></a>
                    </div>
                  </div>
                  {{-- 3 items --}}
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/TenisDeCampo.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Tenis de Campo</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/TenisDeMesa.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Tenis de Mesa</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ asset('images/deportes/Voleibol.jpg') }}" style="max-width: 100%; height:250px"></div>
                        <a href=""><h3>Voleibol</h3></a>
                    </div>
                  </div>
                </div>

                <a class="carousel-control-prev arrows" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next arrows" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
