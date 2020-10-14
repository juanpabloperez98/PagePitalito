@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/show.css') }}">
@endsection



@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $noticia->name }}</h1>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                        Publicado: <span>Fecha</span> <br> 
                        Por: <span>Juan pablo perez</span> 
                    </p>
                </div>
                <div class="panel-body">
                    @if ($noticia->file)
                    <img src="{{ url('/imagen/'.$noticia->file) }}" alt="" class="img-responsive">
                    @endif
                    <hr>
                    {!! $noticia->excerpt !!}
                    <hr>
                    {!! $noticia->body !!}
                    <hr>
                </div>
            </div>

        </div>
        
    </div>

@endsection