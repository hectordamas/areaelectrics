@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Crear Cuenta</title>
<meta name="description" content="Regístrate en {{ env('APP_NAME') }}.">
<meta name="keywords" content="crear cuenta, registro, cables, redes, iluminación, lámparas led">
@endsection

@section('content')
<style>
    .login-container {
        background: #f5f7fa;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 15px;
    }

    .login-box {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        padding: 40px;
        width: 100%;
        max-width: 500px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .login-box h3 {
        font-weight: 700;
        color: #333;
        margin-bottom: 25px;
        text-align: center;
    }

    .login-box .form-control {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ccc;
    }

    .login-box .btn {
        background: #333;
        color: #fff;
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .login-box .btn:hover {
        background: #555;
    }

    .form-note {
        margin-top: 15px;
        text-align: center;
    }

    .form-note a {
        font-weight: bold;
        color: #333;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="login-container">
    <div class="login-box">
        <h3>Crear una Cuenta</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                       placeholder="Nombre Completo">
                @error('name')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email"
                       placeholder="Correo Electrónico">
                @error('email')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror"
                       name="telephone" value="{{ old('telephone') }}" required
                       placeholder="Número Telefónico">
                @error('telephone')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                       name="address" value="{{ old('address') }}" required
                       placeholder="Dirección">
                @error('address')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password" placeholder="Contraseña">
                @error('password')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" required autocomplete="new-password"
                       placeholder="Confirmar Contraseña">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block">Crear una Cuenta</button>
            </div>
        </form>

        <div class="form-note">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a>
        </div>
    </div>
</div>
@endsection
