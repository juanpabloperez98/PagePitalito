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
                  <div class="carousel-item active text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href="{{ route('deportes.show',1) }}"><h3>Titulo1</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo2</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo3</h3></a>
                    </div>
                  </div>
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo4</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo5</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo6</h3></a>
                    </div>
                  </div>
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo7</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo8</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo9</h3></a>
                    </div>
                  </div>
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo10</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"></div>
                        <a href=""><h3>Titulo11</h3></a>
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
