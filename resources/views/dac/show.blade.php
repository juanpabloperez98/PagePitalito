@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/deportes/index.css') }}">
@endsection


@section('content')
    <div class="" id="content-heading">
        <div class="row mx-auto bg-success" id="imagen-presentation">
            <h3>{{ $dac->name }}</h3>
        </div>        
    </div>
    <div class="row mx-auto p-lg-4">
        <div class="col-lg-12 col-12">
            <div class="row mx-auto mt-lg-5">
                <div class="col-lg-4 ml-auto">
                    <p class="info-sport">
                        <span>Número de telefono: </span> {{ $dac->cell_phone }} <br>
                        <span>Dirección: </span> {{$dac->address}} <br>
                        <span>Email: </span>  {{ $dac->email }}
                        <span>Categoria: </span>  {{ $dac->category->name }}
        
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="imagen-content">
                        {{-- <img src="{{ url('/imagen_dacs/' . $dac->path) }}" style="max-width: 100%;height: 100%;" alt=""> --}}
                        @if (Storage::disk('dac_images')->has($dac->path))
                            <img class="card-img-top" src="{{ url('/imagen_dacs/' . $dac->path) }}" style="max-width: 100%;height: 100%;" alt="Card image cap">
                        @else
                            <img class="card-img-top" src="{{ asset('images/ej.jpg') }}" style="max-width: 100%;height: 100%;"  alt="Card image cap">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection