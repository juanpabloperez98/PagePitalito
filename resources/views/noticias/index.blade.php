@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-lg-12">

                <h2>NOTICIAS</h2>
                <div class="row mx-auto">
                    <div class="col-lg-12" id="content-form">
                        @if (session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                        {{-- <h3>¿Que buscas?</h3>
                        <form class="form-inline">
                            <button class="btn" type="submit">
                                <img src="{{ asset('images/icons/search.png') }}" alt="search">
                            </button>
                            <input class="form-control" id="search" type="search" placeholder="Buscar" aria-label="Search">
                        </form> --}}
                    </div>

                    @if ($noticias->first())
                        @foreach ($noticias as $noticia)
                            <div class="col-lg-4 mt-5">
                                <div class="card">
                                    @if (Storage::disk('images')->has($noticia->file))
                                        <img class="card-img-top" src="{{ url('/imagen/' . $noticia->file) }}"
                                            alt="Card image cap">
                                    @else
                                        <img class="card-img-top" src="{{ asset('images/ej1.jpg') }}"
                                            alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $noticia->name }}</h5>
                                        <div class="card-text" style="max-height: 78px; overflow: hidden;">{!! $noticia->excerpt !!}</div>
                                        <div class="botones">
                                            <a href="{{ route('noticias.edit', $noticia->id) }}">
                                                <img src="https://img.icons8.com/metro/26/000000/edit.png"/>
                                            </a>
                                            <a class="ml-2" href="#">
                                                <img src="https://img.icons8.com/metro/26/000000/delete-sign.png"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="col-lg-4 mt-5">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('images/imagennotica.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Articulo 1</h5>
                                    <p class="card-text">Pitalito aprende de musica</p>
                                    <a href="#" class="btn btn-primary">Ver noticia</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('images/imagennotica.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Articulo 1</h5>
                                    <p class="card-text">Pitalito aprende de musica</p>
                                    <a href="#" class="btn btn-primary">Ver noticia</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('images/imagennotica.jpeg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Articulo 1</h5>
                                    <p class="card-text">Pitalito aprende de musica</p>
                                    <a href="#" class="btn btn-primary">Ver noticia</a>
                                </div>
                            </div>
                        </div> --}}
                    @else
                        <div class="col-lg-12 mt-5">
                            <h2>No hay noticias creadas</h2>
                        </div>
                        {{-- <div class="col-lg-4 mt-5">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('images/ej2.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="card-text">Pitalito ha llegado a la casa</p>
                                </div>
                                <div class="botones">
                                    <a href="#">
                                        <img src="https://img.icons8.com/metro/26/000000/edit.png"/>
                                    </a>
                                    <a class="ml-2" href="#">
                                        <img src="https://img.icons8.com/metro/26/000000/delete-sign.png"/>
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    @endif

                    {{-- <div class="col-lg-4 mt-5">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/imagennotica.jpeg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Articulo 1</h5>
                                <p class="card-text">Pitalito aprende de musica</p>
                                <a href="#" class="btn btn-primary">Ver noticia</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/imagennotica.jpeg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Articulo 1</h5>
                                <p class="card-text">Pitalito aprende de musica</p>
                                <a href="#" class="btn btn-primary">Ver noticia</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/imagennotica.jpeg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Articulo 1</h5>
                                <p class="card-text">Pitalito aprende de musica</p>
                                <a href="#" class="btn btn-primary">Ver noticia</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection


