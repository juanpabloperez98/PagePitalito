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
                            Crear Deporte
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
                        
                        <form enctype="multipart/form-data" method="POST" action="{{ route('deportes.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre Deporte</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nombre del deporte" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="in_charge">Persona a cargo</label>
                                <input type="in_charge" class="form-control" id="in_charge" name="in_charge" placeholder="Persona a cargo">
                            </div>
                            <div class="form-group">
                                <label for="profile">Pefil a cargo</label>
                                <input type="profile" class="form-control" id="profile" name="profile" placeholder="Pefil a cargo">
                            </div>
                            <button type="submit" class="btn btn-success">
                                Crear Deporte
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@section('scripts')
    {{-- <script src="{{ asset('vendor/stringtoslug/jquery.stringToSlug.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
    </script>
@endsection
@endsection