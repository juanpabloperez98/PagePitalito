@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/deportes/index.css') }}">
@endsection


@section('content')
    <div class="" id="content-heading">
        <div class="row mx-auto bg-success" id="imagen-presentation">
            <h3>Nombre del deporte</h3>
        </div>        
    </div>
    <div class="row mx-auto p-lg-4">
        <div class="col-lg-12 col-12">
            <div class="row mx-auto mt-lg-5">
                <div class="col-lg-4 ml-auto">
                    <p class="info-sport">
                        <span>Dirigida por: </span> Nombre del dirigente <br>
                        <span>Pefil profesiona: </span> Nombre del perfil <br>
                        <span>Horarios y luga de entrenamiento: </span> 
                        <div><ul class="container">
                        <li>Luenes: 7-10</li>
                        <li>Luenes: 7-10</li>
                        <li>Luenes: 7-10</li>
                        <li>Luenes: 7-10</li>
                        </ul></div>
                        <span style="color: #104495; font-weight: bold">Formulario de inscripción: </span> link del formulario 

                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="imagen-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection