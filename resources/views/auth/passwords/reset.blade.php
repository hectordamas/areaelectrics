@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Recuperar Contraseña</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="login_wrap">
                <div class="padding_eight_all bg-white">
                    <div class="heading_s1">
                        <h3>Restablecer Contraseña</h3>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}" class="row">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="col-md-12 mb-3">
                            <label for="email">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="password">Contraseña</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="password-confirm">Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out btn-block btn-radius">
                                <i class="fas fa-paper-plane"></i> Restablecer Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
