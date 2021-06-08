@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/acciones.css') }}">
@endsection

@section('content')
    <div class="mx-auto" style="max-width: 1111px;padding-top: 100px">
        {{-- Noticias --}}
        @can('noticias.all')
            {{-- <div class="row mx-auto">
                <div class="col-lg-12 mx-auto text-center mb-5">
                    <h3 style="font-weight: bold">Administración de Noticias</h3>
                </div>
                <div class="col-lg-4 mx-auto">
                    <h4 class="text-center">Noticias</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="{{ route('noticias.index') }}" class=""><img src="{{ asset('images/icons/show.png') }}"
                                alt="show"></a>
                        <a href="{{ route('noticias.create') }}" class="ml-2"><img
                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        <a href="{{ route('noticias.edit') }}" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                        <a href="{{ route('') }}" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a>
                    </div>
                </div>
            </div> --}}
            <div class="row mx-auto">
                <div class="col-lg-12 mx-auto text-left mb-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Administración de Noticias
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Noticias</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="{{ route('noticias.index') }}" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="{{ route('noticias.create') }}" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Administración Cultura
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Escuelas de Formación Artística y Cultural</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="#" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="#" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Directorio Artístico y Cultural</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="{{ route('dac.index') }}" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="{{ route('dac.create') }}" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Patrimonio Cultural</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="#" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="#" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Administración Deporte
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Escuelas de Formación Deportiva</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="{{ route('deportes.index') }}" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="{{ route('deportes.create') }}" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Actividad Física, Laboyano Activo y Saludable</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="#" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="#" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Deporte Social Comunitario</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="#" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="#" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Infraestructura Deportiva</td>
                                                <td class="row">
                                                    <div class="col-lg-3 ml-auto">
                                                        <a href="#" class=""><img
                                                                src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                                                        <a href="#" class="ml-2"><img
                                                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <hr style="width: 100%">

        {{-- Deportes --}}
        {{-- @can('deportes.all')
            <div class="row mx-auto space-between">
                <div class="col-lg-12 mx-auto text-center mb-5">
                    <h3 style="font-weight: bold">Administración de Deportes</h3>
                </div>
                <div class="col-lg-4">
                    <h4 class="">Escuelas Formación Deportivas</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="{{ route('deportes.index') }}" class=""><img src="{{ asset('images/icons/show.png') }}"
                                alt="show"></a>
                        <a href="{{ route('deportes.create') }}" class="ml-2"><img
                                src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="">Actividad Fisica Laboyano Activo</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="#" class=""><img src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h4 class="">Infraestructura Deportiva</h4>
                    <div class="imagen">
                        <img src="{{ asset('images/random.jpg') }}" alt="imagen">
                    </div>
                    <div class="botones text-right">
                        <a href="#" class=""><img src="{{ asset('images/icons/show.png') }}" alt="show"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/create.png') }}" alt="create"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/edit.png') }}" alt="edit"></a>
                        <a href="#" class="ml-2"><img src="{{ asset('images/icons/delete.png') }}" alt="delete"></a>
                    </div>
                </div>
            </div>
        @endcan --}}
    </div>
@endsection
