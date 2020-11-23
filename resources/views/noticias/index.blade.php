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
                                    @if (Storage::disk('notices_images')->has($noticia->file))
                                        <img class="card-img-top" src="{{ url('/imagen/' . $noticia->file) }}" alt="Card image cap">
                                    @else
                                        <img class="card-img-top" src="{{ asset('images/ej1.jpg') }}" alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $noticia->name }}</h5>
                                        {{-- <div class="card-text" id="content-p">{!! $noticia->excerpt !!}</div> --}}
                                        <div class="botones">
                                            <a href="{{ route('noticias.edit', $noticia->id) }}">
                                                <img src="https://img.icons8.com/metro/26/000000/edit.png" />
                                            </a>
                                            {{-- <a class="ml-2" href="#">
                                                <img src="https://img.icons8.com/metro/26/000000/delete-sign.png" />
                                            </a> --}}
                                            <a href="#modalWindow" role="button" class="ml-2"
                                                data-toggle="modal"><img src="https://img.icons8.com/metro/26/000000/delete-sign.png" /></a>
                                            <div id="modalWindow" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" style="margin-left: 0px" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">¿Estás seguro?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Seguro que quieres borrar este elemento?</p>
                                                            <p class="text-warning"><small>Si lo borras, nunca podrás
                                                                    recuperarlo.</small></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                                            <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
                                                                {{ method_field('delete') }}
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Eliminar</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                        <img src="https://img.icons8.com/metro/26/000000/edit.png" />
                                    </a>
                                    <a class="ml-2" href="#">
                                        <img src="https://img.icons8.com/metro/26/000000/delete-sign.png" />
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
