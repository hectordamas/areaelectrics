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

                    <form method="POST" action="{{ route('password.email') }}" class="row">
                        @csrf

                        <div class="col-md-12 form-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu Correo Electrónico" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out">
                                <i class="fas fa-paper-plane"></i> Enviar Link de Recuperación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
