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
                                <label for="modality">Nombre Deporte</label>
                                <input type="text" class="form-control" id="modality" name="modality"
                                    placeholder="Nombre del deporte" value="{{ old('modality') }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="instructor">Persona a cargo</label>
                                <select class="form-control" id="instructor" name="instructor">
                                    @php
                                        $instructors = App\Instructor::orderBy('id', 'asc')->get();
                                    @endphp
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</option>
                                    @endforeach
                                </select>
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
                            <input type="hidden" name="totalhorarios" id="totalhorarios">
                            <div class="form-group" id="hiddenschudeles">
                            </div>
                        </form>
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
                                                <option value="default">Escoga un horario</option>
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
                                        action="{{ route('save_schudele') }}">
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
                                                        <option data-id={{ $i + 0.5 }} value={{ $i+0.5 }}>{{ $i }}:30</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group d-inline-block" style="width: 45%; margin-left: 41px">
                                                <div class="" id="fin_d">
                                                    <label for="fin">Fin</label>
                                                    <select class="form-control" id="fin" name="fin">
                                                    @for ($i = 6; $i < 23; $i++)
                                                        <option data-id={{ $i }} value={{ $i }}>{{ $i }}:00</option>
                                                        <option data-id={{ $i + 0.5 }} value={{ $i + 0.5 }}>{{ $i }}:30</option>
                                                    @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="modal-footer">
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
        $(document).ready(function() {


            var showHorarios= () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('show_schudele') }}",
                    type: 'get',
                    dataType: 'text',
                    cache: false,
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

            // Show modal create schedule
            $('#create').on('click', (e) => {
                $('#Mymodal').modal('hide')
                $('#ModalHorario').modal('show')
            })


            // AJax petition
            $('#form-schedule').submit(function(e) {
                e.preventDefault();
                const $this = $(this);
                const data = $this.serializeArray()
                console.log(data)
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
                    ,
                    dataType: 'json',
                    cache: false,
                    success: function(r) {
                        console.log(r)
                        if (r.status == 400) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: r.message
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: r.message,
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

            lista_schedules = []
            var i = 0
            // Add when push in save
            $('#save').on('click', (e) => {
                // console.log($('#horarios').find(":selected").attr("id"))
                // console.log($('#horarios').val())
                console.log(typeof($('#horarios').find(":selected").attr("id")))
                
                var id_selected = parseInt($('#horarios').find(":selected").attr("id"))

                if (lista_schedules.includes(id_selected)){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: "Error ya ha sido agregado el horario!"
                    })
                }else{
                    // Add in content
                    i++
                    text =  document.createTextNode($('#horarios').val())
                    p = document.createElement('p')
                    p.appendChild(text)
                    p.setAttribute("id",id_selected)
                    content = document.getElementById("content")
                    content.appendChild(p)
                    lista_schedules.push(id_selected)
                    // Add in hiddenschudeles
                    hiddenschudeles = document.getElementById("hiddenschudeles")
                    input =  document.createElement("input")
                    input.setAttribute("name","schedule"+i)
                    input.setAttribute("type","hidden")
                    input.setAttribute("value",id_selected)
                    hiddenschudeles.appendChild(input)
                    total_horarios = document.getElementById("totalhorarios")
                    total_horarios.setAttribute("value",i)
                }
            })


            // var init_profile = () => {
            //     childnodes = document.getElementById('instructor').childNodes;
            //     attr = childnodes[1].value

            //     $.ajax({
            //         url: url,
            //         method: 'post',
            //         data: {
            //             "id":attr,
            //             "_token": '{{ csrf_token() }}'
            //         },
            //         dataType: 'json',
            //         success: function(res) {
            //             console.log(res.profile)
            //             create_selects(res.profile)
            //         },
            //         error: function(e) {
            //             console.log(e);
            //         }
            //     })
            

            // init_profile()

            // var create_selects = (select_) => {
            //     // console.log(select_)
            //     profile = document.getElementById('profile');
            //     textNodo = document.createTextNode(select_)
            //     profile.appendChild(textNodo)
            //     profile.setAttribute("name",select_)
            // }

        })

    </script>
@endsection
@endsection
