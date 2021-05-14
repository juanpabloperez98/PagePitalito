@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="row mx-auto" id="row-form">
        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                <h2>REGISTRATE</h2>
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name">NOMBRES COMPLETOS <span>*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"
                        placeholder="e.g Andres Felipe" required>
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label for="lastname">APELLIDOS COMPLETOS <span>*</span></label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}"
                        placeholder="e.g Bermudez Soto" required>
                    @if ($errors->has('apellido'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">CORREO ELECTRONICO <span>*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="e.g andresfelip@gmail.com" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">FOTO DE PERFIL <span>*</span></label>
                    <input type="file" name="image" id="image" class="form-control" style="border: none; padding: 7px 3px;">
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">CONTRASEÑA <span>*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="***********"
                        required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm">CONFIRMAR CONTRASEÑA <span>*</span></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="***********" required>
                </div>

                <div class="form-group text-center" id="contentboton">
                    <button type="submit">
                        REGISTRAR
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
