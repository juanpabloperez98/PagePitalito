@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/noticias/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-lg-12 text-center">
                <h4 style="font-weight: bold">Instituto de Cultura, Recreación y Deporte</h4>
            </div>
            <div class="col-lg-12 mt-3 text-justify">
                <h5>Misión</h5>
                <p>
                    Es misión del Instituto, ser la entidad que lidere el sector público municipal de cultura, recreación y deporte para garantizar los derechos constitucionales de los habitantes de Pitalito, mediante la formulación concertada de políticas públicas y su gestión integral con enfoque territorial y poblacional como condiciones esenciales de la calidad de vida, la sostenibilidad y la democracia en el municipio.
                </p>
            </div>
            <div class="col-lg-12 mt-3 text-justify">
                <h5>Visión</h5>
                <p>
                    Para el 2020, mediante la mejora de los procesos del ICRD, alcanzaremos mayor cobertura de la población objetivo, y  el reconocimiento como promotor de la cultura y el deporte,  ejes de la convivencia y armonía social.
                </p>
                <hr>
            </div>
            <div class="col-lg-12 mt-3">
                <h5>Dirección</h5>
                <p>
                    Centro Cultural Hector Polanía Sánchez<br>
                    Carrera 7 # 6-41
                </p>
            </div>
            <div class="col-lg-12 mt-3">
                <h5>Horario de Atención</h5>
                <p>
                    Lunes a Jueves: 8:00 a.m - 12:30 p.m | 2:00 p.m a 6:00 p.m<br>
                    Viernes: 8:00 a.m - 12:30 p.m | 2:00 p.m a 5:00 p.m
                </p>
            </div>
            <div class="col-lg-12 mt-3">
                <h5>Contacto</h5>
                <p>
                    Teléfono Conmutador: 038 8350770<br>
                    Fax: 0578350770
                </p>
            </div>
        </div>
    </div> 
@endsection