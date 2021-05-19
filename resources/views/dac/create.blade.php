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
                                <select class="form-control" id="category" name="category">
                                    @php
                                        $categories = App\Category::orderBy('id', 'asc')->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Subcategoría</label>
                                <select class="form-control" id="subcategory" name="subcategory">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="cell_phone">Numero de telefono</label>
                                <input type="text" class="form-control" id="cell_phone" name="cell_phone"
                                    placeholder="Numero de telefono" value="{{ old('cell_phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Dirección"
                                    value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Correo electronico" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" id="link" name="link"
                                    placeholder="Link de red social" value="{{ old('link') }}">
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
                url = '{{ route("getSubcategories") }}'
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

            var create_selects = (name) => {
                subcategory = document.getElementById('subcategory');
                select = document.createElement('option');
                textNodo = document.createTextNode(name)
                select.appendChild(textNodo)
                select.setAttribute("value",name)
                select.value = name
                subcategory.appendChild(select)
            }

            $('#category').on('change', function(e) {
                console.log(this.value)
                url = '{{ route("getSubcategories") }}'
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
                            // console.log()
                            create_selects(element.name)
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
