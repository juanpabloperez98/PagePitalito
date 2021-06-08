@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-lg-12">
                <h2>Registros Directorio Artístico y Cultural</h2>
                <h1>De Pitalito Para el Mundo</h1><br>
                <div class="row mx-auto">
                    <div class="col-lg-6" id="content-form">
                        @if (session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                        <form class="needs-validation mt-2" novalidate action="{{ route('filter_dac') }}" method="GET">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-8 mb-3">
                                    <label for="name">Busqueda por nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="category">Categoría</label>
                                    <select class="form-control" id="category" name="category">
                                        @php
                                            $categories = App\Category::orderBy('id', 'asc')->get();
                                        @endphp
                                            <option value="default">Escoge una opción</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="subcategory">Subcategoría</label>
                                    <select class="form-control" id="subcategory" name="subcategory">
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary mr-auto" type="submit">Buscar</button>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        @if ($dacs->first())
                            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                                <div class="carousel-inner">
                                    @php
                                        $init = 0;
                                    @endphp

                                    @foreach ($dacs as $dac)
                                        @if ($init == 0)
                                            <div class="carousel-item active">
                                                <div class="card" style="">
                                                    @if (Storage::disk('dac_images')->has($dac->path))
                                                        <img class="card-img-top"
                                                            src="{{ url('/imagen_dacs/' . $dac->path) }}"
                                                            alt="Card image cap">
                                                    @else
                                                        <img class="card-img-top" src="{{ asset('images/ej.jpg') }}"
                                                            alt="Card image cap">
                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $dac->name }}</h5>
                                                        {{-- <h5 class="card-title">{{ $dac->subcategory->category->name }}</h5> --}}
                                                        <h5 class="card-title">{{ $dac->cell_phone}}</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            {{ $dac->subcategory->name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <div class="card" style="">
                                                    @if (Storage::disk('dac_images')->has($dac->path))
                                                        <img class="card-img-top"
                                                            src="{{ url('/imagen_dacs/' . $dac->path) }}"
                                                            alt="Card image cap">
                                                    @else
                                                        <img class="card-img-top" src="{{ asset('images/ej.jpg') }}"
                                                            alt="Card image cap">
                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $dac->name }}</h5>
                                                        {{-- <h5 class="card-title">{{ $dac->subcategory->category->name }}</h5> --}}
                                                        <h5 class="card-title">{{ $dac->cell_phone}}</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            {{ $dac->subcategory->name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $init++;
                                        @endphp
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev arrows" {{-- style="left: -60px;" --}}
                                    href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next arrows" {{-- style="right: -60px;" --}}
                                    href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @else
                            <h2>No hay registros creados</h2>
                        @endif
                    </div>


                    {{--  --}}

                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        $(document).ready(function() {

            var delete_childs = (id) => {
                parent = document.getElementById(id)
                while (parent.firstChild) {
                    parent.removeChild(parent.firstChild);
                }
            }

            var init_selects = () => {
                childnodes = document.getElementById('category').childNodes;
                attr = childnodes[1].value
                url = '{{ route("dac.getsubcategories") }}'
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        "category":attr,
                        "_token": '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        var count = Object.keys(res).length;
                        for (let i = 0; i < count; i++) {
                            var element = res[i];
                            console.log(element)
                            create_selects(element.name)
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            }
            init_selects()

            var create_selects = (select_) => {
                subcategory = document.getElementById('subcategory');
                select = document.createElement('option');
                textNodo = document.createTextNode(select_.name)
                select.appendChild(textNodo)
                select.setAttribute("value",select_.id)
                // select.value = name
                subcategory.appendChild(select)
            }

            $('#category').on('change', function(e) {
                console.log(this.value)
                url = '{{ route("dac.getsubcategories") }}'
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        "category":this.value,
                        "_token": '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        var count = Object.keys(res).length;
                        delete_childs('subcategory')
                        for (let i = 0; i < count; i++) {
                            var element = res[i];
                            create_selects(element)
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            })
        });

    </script>
@endsection
@endsection
