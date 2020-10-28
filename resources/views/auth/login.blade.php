@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="row mx-auto" id="row-form">
        <div class="col-lg-12">
            <form method="post" action="{{ route('login') }}">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <h2>INGRESA</h2>
                {{ csrf_field() }}
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

                <div class="form-group text-center" id="contentboton">
                    <button type="submit">
                        INGRESAR
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- <div class="top-section" style="margin-top: 180px"></div>
    --}}
@endsection
