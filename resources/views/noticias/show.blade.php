@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/show.css') }}">
@endsection



@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $noticia->title }}</h1>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                        Publicado: <span>Fecha</span> <br> 
                        Por: <span>Juan pablo perez</span> 
                    </p>
                </div>
                <div class="panel-body">
                    @if ($noticia->path)
                    <img src="{{ url('/imagen/'.$noticia->path) }}" alt="" class="img-responsive">
                    @endif
                    <hr>
                    <div class="container">
                        {!! $noticia->body !!}
                    </div>
                    <hr>
                </div>
            </div>

        </div>
        
    </div>

@endsection