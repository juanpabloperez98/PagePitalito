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
                            Editar Perfil
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

                        @if (session('info'))
                            <div class="alert alert-success">
                                <ul>
                                    <li style="list-style: none">
                                        {{ session('info') }}
                                    </li>
                                </ul>
                            </div>
                        @endif

                        <form enctype="multipart/form-data" method="POST" action="{{ route('UserUpdate', $user->id) }}">
                            @csrf
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">NOMBRES COMPLETOS</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="e.g Andres Felipe" required>
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname">APELLIDOS COMPLETOS</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->last_name }}" placeholder="e.g Bermudez Soto" required>
                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">CORREO ELECTRONICO</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="e.g andresfelip@gmail.com" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="contentimg" >
                                @if (\Storage::disk('photos_porfile')->has($user->file))
                                    <img src="{{ route('getPorfileImage', $user->file) }}" alt="imagen" style="width: 100%">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">FOTO DE PERFIL</label>
                                <input type="file" name="image" id="image" class="form-control" style="border: none; padding: 7px 3px;">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">CONTRASEÑA <span>*</span></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="***********" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">CONFIRMAR CONTRASEÑA <span>*</span></label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="***********" required>
                            </div> --}}

                            <div class="form-group" id="contentboton">
                                <button type="submit">
                                    Editar Perfil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
