@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-lg-12">
                <h2>Registros DAC</h2>
                <div class="row mx-auto">
                    <div class="col-lg-6" id="content-form">
                        @if (session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                        <form class="needs-validation mt-2" novalidate>
                            <div class="form-row">
                                <div class="col-md-8 mb-3">
                                    <label for="name">Busqueda por nombre</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nombre" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip03">Categoría</label>
                                    <select class="custom-select" id="validationTooltip04" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip04">Subcategoría</label>
                                    <select class="custom-select" id="validationTooltip04" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please select a valid state.
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mr-auto" type="submit">Buscar</button>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        @if ($dacs->first())
                            @foreach ($dacs as $dac)
                                <div class="card">
                                    @if (Storage::disk('dac_images')->has($dac->path))
                                        <img class="card-img-top" src="{{ url('/imagen_dacs/' . $dac->path) }}"
                                            alt="Card image cap">
                                    @else
                                        <img class="card-img-top" src="{{ asset('images/ej.jpg') }}"
                                            alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $dac->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $dac->subcategory }}</h6>
                                        <div class="botones">
                                            <a href="{{ route('noticias.edit', $dac->id) }}">
                                                <img src="https://img.icons8.com/metro/26/000000/edit.png" />
                                            </a>
                                            <a href="#modalWindow" role="button" class="ml-2" data-toggle="modal"><img
                                                    src="https://img.icons8.com/metro/26/000000/delete-sign.png" /></a>
                                            <div id="modalWindow" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" style="margin-left: 0px"
                                                                data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">¿Estás seguro?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Seguro que quieres borrar este elemento?</p>
                                                            <p class="text-warning"><small>Si lo borras, nunca podrás
                                                                    recuperarlo.</small></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cerrar</button>

                                                            <form action="{{ route('noticias.destroy', $dac->id) }}"
                                                                method="POST">
                                                                {{ method_field('delete') }}
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Eliminar</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h2>No hay registros creados</h2>
                        @endif
                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
