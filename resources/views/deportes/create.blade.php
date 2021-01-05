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
                                <input type="in_charge" class="form-control" id="in_charge" name="in_charge"
                                    placeholder="Persona a cargo">
                            </div>
                            <div class="form-group">
                                <label for="profile">Pefil a cargo</label>
                                <input type="profile" class="form-control" id="profile" name="profile"
                                    placeholder="Pefil a cargo">
                            </div>
                            <div id="content">
                            </div>
                            <div class="form-group">
                                <label for="#">Agregar Horario</label>
                                <a href="#" data-toggle="modal" data-target="#Mymodal"><span> <img
                                            src="{{ asset('images/icons/add.png') }}" alt="add-icon"> </span></a>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Crear Deporte
                            </button>
                        </form>
                        <div class="modal fade" id="Mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
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
                                                {{-- @foreach ($horarios as $horario)
                                                    <option>{{ $horario->day }} {{ $horario->start }} -
                                                        {{ $horario->finish }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="create" class="btn btn-success">Crear Horario</button>
                                        <button type="button" id="save" class="btn btn-primary">&#43; Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalHorario" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear horario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form enctype="multipart/form-data" method="POST" id="form-schedule"
                                        action="{{ route('create-schedule') }}">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="day">Dia</label>
                                                <select class="form-control" name="day" id="day">
                                                    <option>Lunes</option>
                                                    <option>Martes</option>
                                                    <option>Miercoles</option>
                                                    <option>Jueves</option>
                                                    <option>Viernes</option>
                                                    <option>Sabado</option>
                                                    <option>Domingo</option>
                                                </select>
                                            </div>
                                            <div class="form-group d-inline-block" style="width: 45%">
                                                <label for="start">Inicio</label>
                                                <select class="form-control" id="start" name="start">
                                                    @for ($i = 6; $i < 23; $i++)
                                                        <option data-id={{ $i }} value={{ $i }}>{{ $i }}:00</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group d-inline-block" style="width: 45%; margin-left: 41px">
                                                <div class="desactivate" id="fin_d">
                                                    <label for="fin">Fin</label>
                                                    <select class="form-control" id="fin" name="fin"></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desactivate" id="modal-footer">
                                            <div class="modal-footer">
                                                <button type="submit" id="save-schedule" class="btn btn-primary">&#43; Crear
                                                    horario</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@section('scripts')
    <script>
        var numero_horarios = 0,
            start_ = false

        var showHorarios= () => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('show-schedule') }}",
                type: 'get',
                dataType: 'text',
                cache: false,
                // data: {"_token": '{{ csrf_token() }}'},
                success: function(r) {
                    // console.log(r)
                    $('#horarios').html(r)
                },
                error: function(r) {
                    console.log(r);
                }
            });

        }

        showHorarios()

        // Adding elements when is selected a schedule
        var addElements = () => {
            var contenedor = document.getElementById('form'),
                input = document.createElement('input')

            input.setAttribute('id', 'input' + numero_horarios)
            input.setAttribute('type', 'hidden')
            input.setAttribute('name', 'input' + numero_horarios)
            contenedor.appendChild(input)
            var p = document.createElement('p'),
                contenedor2 = document.getElementById('content')
            p.innerHTML = lista_horarios[numero_horarios]
            contenedor2.appendChild(p)
        }

        // Creating elements when start select element change
        var createElementsForm = (start) => {
            var select_ = document.getElementById('fin')
            while (select_.firstChild) {
                select_.removeChild(select_.firstChild);
            }
            start = parseInt(start)
            for (let i = start + 1; i < 23; i++) {
                var option = document.createElement('option'),
                    value = document.createTextNode(i + ":00")
                option.appendChild(value)
                option.setAttribute('value', i)
                select_.appendChild(option)
            }
        }

        // Add elements to finish select
        var start = $('#start option:selected').attr('data-id')
        createElementsForm(start)
        if (!start_) {
            $('#fin_d').toggle('fold')
            $('#modal-footer').toggle('fold')
            start_ = true
        }

        var lista_horarios = []

        // Save a schedule
        $('#save').on('click', (e) => {
            var horario = $('#horarios option:selected').val()
            if (lista_horarios.includes(horario)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Este horario ya ha sido agregado',
                })
            } else {
                lista_horarios.push(horario)
                $('#Mymodal').modal('hide')
                addElements()
                numero_horarios++
            }

        })

        // Show modal create schedule
        $('#create').on('click', (e) => {
            $('#Mymodal').modal('hide')
            $('#ModalHorario').modal('show')
        })

        // Value when the element #start change
        $('#start').on('change', (e) => {
            var start = $('#start option:selected').attr('data-id')
            createElementsForm(start)
            if (!start_) {
                $('#fin_d').toggle('fold')
                $('#modal-footer').toggle('fold')
                start_ = true
            }
        })

        // AJax petition
        $('#form-schedule').submit(function(e) {
            e.preventDefault();
            const $this = $(this);
            const data = $this.serializeArray()
            var formId = '#form-schedule';
            $.ajax({
                url: $(formId).attr('action'),
                type: $(formId).attr('method'),
                data: {
                    "day": data[0].value,
                    "start": data[1].value,
                    "finish": data[2].value,
                    "_token": '{{ csrf_token() }}'
                }
                /* data: $this.serialize() */
                ,
                dataType: 'text',
                cache: false,
                success: function(r) {
                    var dataJSON = JSON.parse(r)
                    if (dataJSON.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: dataJSON.message,
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: dataJSON.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#ModalHorario').modal('hide')
                        showHorarios()
                    }
                },
                error: function(r) {
                    console.log(r);
                }
            });

        })

    </script>
@endsection
@endsection
