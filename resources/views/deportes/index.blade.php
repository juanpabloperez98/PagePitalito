@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/deportes/index.css') }}">
@endsection


@section('content')
    <div class="" id="content-heading">
        <div class="row mx-auto bg-success" id="imagen-presentation">
            <h3>ESCUELAS DE FORMACIÓN DEPORTIVA</h3>
        </div>        
    </div>
    <div class="row mx-auto p-lg-4">
        <div class="col-lg-12 col-12">
            @if (session('info'))
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            @endif

            @php
                $longitud = sizeof($deportes);
                // var_dump($longitud);    
            @endphp
            
            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner"> 
                    @for ($i = 0; $i < $longitud; $i++)
                        @if ($i == 0)
                            <div class="carousel-item active text-center">
                                <div class="box-example mx-3">
                                    <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[$i]->path]) }}" style="max-width: 100%; height:250px"></div>
                                    <a href="{{ route('deportes.show',$deportes[$i]->id) }}"><h3>{{ $deportes[$i]->name }}</h3></a>
                                </div>
                                @can('deportes.all')
                                    <div class="botones mt-3">
                                        <a href="{{ route('deportes.edit',$deportes[$i]->id) }}" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a>
                                    </div>
                                @endcan
                            </div>
                        @else 
                            <div class="carousel-item text-center">
                                <div class="box-example mx-3">
                                    <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[$i]->path]) }}" style="max-width: 100%; height:250px"></div>
                                    <a href="{{ route('deportes.show',$deportes[$i]->id) }}"><h3>{{ $deportes[$i]->name }}</h3></a>
                                </div>
                                @can('deportes.all')
                                    <div class="botones mt-3">
                                        <a href="{{ route('deportes.edit',$deportes[$i]->id) }}" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a>
                                    </div>
                                @endcan
                            </div>
                        @endif      
                    @endfor
                </div>

                <a class="carousel-control-prev arrows" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next arrows" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
