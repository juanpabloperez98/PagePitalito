@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-success">
                <ul>
                    <li style="list-style: none">
                        {{ session('info') }}
                    </li>
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ Auth::user()->name }}
                        <div class="float-right">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                Sesion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row mx-auto">
                            <div class="col-lg-6 col-6">
                                <div>
                                    @if (Storage::disk('photos_porfile')->has(Auth::user()->profile_photo))
                                        <img src=" {{ route('getPorfileImage', Auth::user()->profile_photo) }}" alt="imagen-perfil"
                                            style="width: 100%;">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="imagen-perfil"
                                            style="width: 100%;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="mt-3">
                                    <h4 class="d-inline">Nombre:</h4> <span>{{ Auth::user()->first_name }}</span>
                                </div>
                                <div class="mt-3">
                                    <h4 class="d-inline">Apellidos:</h4> <span>{{ Auth::user()->last_name }}</span>
                                </div>
                                <div class="mt-3">
                                    <h4 class="d-inline">Correo:</h4> <span>{{ Auth::user()->email }}</span>
                                </div>
                                <div class="mt-3">
                                    <h4 class="d-inline">Registrado:</h4>
                                    <span>{{ Auth::user()->created_at->toDateString() }}</span>
                                </div>
                                <div class="botones-edit">
                                    <a href="{{ route('UserEdit') }}">Editar perfil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


@endsection
