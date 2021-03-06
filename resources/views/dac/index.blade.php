@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-lg-12">
                <h2>Registros Directorio Artístico y Cultural</h2>
                <h1>De Pitalito Para el Mundo</h1>
                <div class="row mx-auto">
                    <div class="col-lg-12" id="content-form">
                        @if (session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                    </div>

                    @if ($dacs->first())
                        @foreach ($dacs as $dac)
                            <div class="col-lg-4 mt-5">
                                <div class="card">
                                        @if (Storage::disk('dac_images')->has($dac->path))
                                            <img class="card-img-top" class="w-100" src="{{ url('/imagen_dacs/' . $dac->path) }}" alt="Card image cap">
                                        @else
                                            <img class="card-img-top" class="w-100" src="{{ asset('images/ej.jpg') }}" alt="Card image cap">
                                        @endif
                                    <div class="card-body" style="z-index: 1;">
                                        <h5 class="card-title">{{ $dac->subcategory->category->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $dac->subcategory->name }}</h6>
                                        <h5 class="card-title">{{ $dac->name }}</h5>
                                        {{-- <h6 class="card-subtitle mb-2 text-muted">{{ $dac->subcategory }}</h6> --}}
                                        {{-- <div class="botones">
                                            <a href="#">
                                                <img src="https://img.icons8.com/metro/26/000000/edit.png" />
                                            </a>
                                            <a href="#modalWindow2" role="button" class="ml-2"data-toggle="modal"><img src="https://img.icons8.com/metro/26/000000/delete-sign.png" /></a>
                                            <div id="modalWindow2" class="modal fade">
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

                                                            <form action="{{ route('noticias.destroy', $dac->id) }}" method="POST">
                                                                {{ method_field('delete') }}
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Eliminar</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12 mt-5">
                            <h2>No hay registros creados</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection