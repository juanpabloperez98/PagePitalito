@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/acciones.css') }}">
@endsection

@section('content')
    <div class="mx-auto" style="max-width: 1111px;padding-top: 100px">
        {{-- Noticias --}}
        @can('noticias.all')
            <div class="row mx-auto">
                <div class="col-lg-12 mx-auto text-center mb-5">
                    <h3 style="font-weight: bold">Administración de Noticias</h3>
                </div>
                <div class="col-lg-4 mx-auto">
                    <h4 class="text-center">Noticias</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="{{ route('noticias.index') }}" class=""><img src="{{ asset('images/icons/show.png') }}"
                                alt="show"></a>
                        <a href="{{ route('noticias.create') }}" class="ml-2"><img
                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        {{-- <a href="{{ route('noticias.edit') }}" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                    <a href="{{ route('') }}" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a> --}}
                    </div>
                </div>
            </div>
        @endcan

        <hr style="width: 100%">
        
        {{-- Deportes --}}
        @can('deportes.all')
            <div class="row mx-auto space-between">
                <div class="col-lg-12 mx-auto text-center mb-5">
                    <h3 style="font-weight: bold">Administración de Deportes</h3>
                </div>
                <div class="col-lg-4">
                    <h4 class="">Escuelas Formación Deportivas</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="{{ route('deportes.index') }}" class=""><img src="{{ asset('images/icons/show.png') }}"
                                alt="show"></a>
                        <a href="{{ route('deportes.create') }}" class="ml-2"><img
                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        {{-- <a href="#" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="">Actividad Fisica Laboyano Activo</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="#" class=""><img src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        {{-- <a href="#" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a> --}}
                    </div>
                </div>

                <div class="col-lg-4">
                    <h4 class="">Infraestructura Deportiva</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="#" class=""><img src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        {{-- <a href="#" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a> --}}
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
