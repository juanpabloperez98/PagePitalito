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
                            Crear Noticia
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
                        <form enctype="multipart/form-data" method="POST" action="{{ route('noticias.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Titulo de la noticia" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                            </div>
                            <div class="form-group">
                                <label for="resumen">Resumen</label>
                                <textarea name="resumen" id="resumen" class="form-control" rows="3">
                                    {{ old('resumen') }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="noticia">Noticia</label>
                                <textarea class="form-control" id="noticia" name="noticia" rows="5">
                                    {{ old('noticia') }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="PUBLISHED">Publicado</option>
                                    <option value="DRAFT">Borrador</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">
                                Crear noticia
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@section('scripts')
    <script src="{{ asset('vendor/stringtoslug/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#title,#slug').stringToSlug({
                callback: function(text) {
                    $('#slug').val(text)
                }
            })
        })

        CKEDITOR.config.height = 400;
        CKEDITOR.config.width = 'auto';

        CKEDITOR.replace('noticia')
        CKEDITOR.replace('resumen')

    </script>
@endsection
@endsection
