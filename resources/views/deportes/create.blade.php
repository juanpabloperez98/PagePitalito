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
                        
                        <form enctype="multipart/form-data" method="POST" id="form" action="{{ route('deportes.store') }}">
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
                            <div id="content">
                            </div>
                            <div class="form-group">
                                <label for="#">Agregar Horario</label>
                                <a href="#" data-toggle="modal" data-target="#Mymodal"><span> <img src="{{ asset('images/icons/add.png') }}" alt="add-icon"> </span></a>
                            </div>

                            <div class="modal fade" id="Mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Lista de horarios</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select id="horarios" class="form-control">
                                                <option>Lunes 7:00 - 10:00</option>
                                                <option>Miercoles 7:00 - 10:00</option>
                                                <option>Viernes 7:00 - 10:00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" id="save" class="btn btn-primary">&#43; Agregar</button>
                                    </div>
                                  </div>
                                </div>
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
    <script>
        var numero_horarios = 0

        var addElements = () => {
            var contenedor = document.getElementById('form'),
                input = document.createElement('input')
                input.setAttribute('id','input'+numero_horarios)
                input.setAttribute('type','hidden')
                input.setAttribute('name','input'+numero_horarios)
                contenedor.appendChild(input)
            var p = document.createElement('p'),
                contenedor2 = document.getElementById('content')
            p.innerHTML = lista_horarios[numero_horarios]
            contenedor2.appendChild(p)
        }

        var lista_horarios = []
        $('#save').on('click',(e)=>{
            var horario = $('#horarios option:selected').val()
            if(lista_horarios.includes(horario)){
                alert("Error !!")
            }else{
                lista_horarios.push(horario)
                $('#Mymodal').modal('hide')
                addElements()
                numero_horarios ++
            }
            
        })

    </script>
@endsection
@endsection