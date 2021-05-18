@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/create.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            Crear Registro DAC
                        </h3>
                    </div>

                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form enctype="multipart/form-data" method="POST" action="{{ route('DAC.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="category">Categoría</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Categoría" value="{{ old('category') }}">
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Subcategoría</label>
                                <input type="text" class="form-control" id="subcategory" name="subcategory" placeholder="Subcategoría" value="{{ old('subcategory') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="cell_phone">Numero de telefono</label>
                                <input type="text" class="form-control" id="cell_phone" name="cell_phone" placeholder="Numero de telefono" value="{{ old('cell_phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="Link de red social" value="{{ old('link') }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-success">
                                Crear registro
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection