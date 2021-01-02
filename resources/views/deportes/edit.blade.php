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
                            Editar Deporte
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
                        @if (session('info'))
                            <div class="alert alert-success">
                                <ul>
                                    <li style="list-style: none">
                                        {{ session('info') }}
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <form enctype="multipart/form-data" method="POST" action="{{ route('deportes.update', $deporte->id) }}">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre Deporte</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nombre del deporte" value="{{ $deporte->name }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                @if (Storage::disk('deportes_images')->has($deporte->file))
                                    <div class="mr-auto" style="width: 50%">
                                        <img src="{{ url('/imagen_deportes/' . $deporte->file) }}" alt="imagen" style="width: 100%">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="in_charge">Persona a cargo</label>
                                <input type="in_charge" class="form-control" id="in_charge" name="in_charge" value="{{ $deporte->in_charge }}" placeholder="Persona a cargo">
                            </div>
                            <div class="form-group">
                                <label for="profile">Pefil a cargo</label>
                                <input type="profile" class="form-control" id="profile" name="profile" value="{{ $deporte->profile }}" placeholder="Pefil a cargo">
                            </div>
                            <button type="submit" class="btn btn-success">
                                Editar Deporte
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





@section('scripts')
    {{-- <script src="{{ asset('vendor/stringtoslug/jquery.stringToSlug.min.js') }}"></script>
    --}}
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        /* $(document).ready(function() {
                    $('#title,#slug').stringToSlug({
                        callback: function(text) {
                            $('#slug').val(text)
                        }
                    })
                }) */

        CKEDITOR.config.height = 400;
        CKEDITOR.config.width = 'auto';

        CKEDITOR.replace('noticia')

    </script>
@endsection
@endsection
