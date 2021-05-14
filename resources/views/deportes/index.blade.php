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
                // var_dump(ceil($longitud/3));    
            @endphp
            
            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner"> 
                    @for ($i = 0; $i < $longitud; $i++)
                        @if ($i == 0)
                            <div class="carousel-item active text-center">
                                <div class="box-example mx-3">
                                    <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[$i]->file]) }}" style="max-width: 100%; height:250px"></div>
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
                                    <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[$i]->file]) }}" style="max-width: 100%; height:250px"></div>
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
                  {{-- <div class="carousel-item active text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[0]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',1) }}"><h3>{{ $deportes[0]->name }}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[1]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',2) }}"><h3>{{$deportes[1]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[2]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',3) }}"><h3>{{$deportes[2]->name}}</h3></a>
                    </div>
                  </div>
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[3]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',4) }}"><h3>{{$deportes[3]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[4]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',5) }}"><h3>{{$deportes[4]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[5]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',6) }}"><h3>{{$deportes[5]->name}}</h3></a>
                    </div>
                  </div>
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[6]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',7) }}"><h3>{{$deportes[6]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[7]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',8) }}"><h3>{{$deportes[7]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[8]->file]) }}" style="max-width:100%; height:250px"></div>
                        <a href="{{ route('deportes.show',9) }}"><h3>{{$deportes[8]->name}}</h3></a>
                    </div>
                  </div>
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[9]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',10) }}"><h3>{{$deportes[9]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[10]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',11) }}"><h3>{{$deportes[10]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[11]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',12) }}"><h3>{{$deportes[11]->name}}</h3></a>
                    </div>
                  </div>
                  <div class="carousel-item text-center">
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[12]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',13) }}"><h3>{{$deportes[12]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[13]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',14) }}"><h3>{{$deportes[13]->name}}</h3></a>
                    </div>
                    <div class="box-example mx-3">
                        <div class="imagen"><img class="" src="{{ route('imageDeporte', ['filename'=>$deportes[14]->file]) }}" style="max-width: 100%; height:250px"></div>
                        <a href="{{ route('deportes.show',15) }}"><h3>{{$deportes[14]->name}}</h3></a>
                    </div>
                  </div> --}}
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
