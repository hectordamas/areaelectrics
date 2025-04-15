@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Iniciar Sesión</title>
<meta name="description" content="Inicia Sesión en {{ env('APP_NAME') }}.">
<meta name="keywords" content="inicia sesion, login, cables, redes, iluminación, lámparas led">
@endsection

@section('content')
<style>
    .login-container {
        background: #f5f7fa; /* fondo gris claro */
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

    .login-footer a {
        color: #555;
        font-weight: 500;
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
        <h3>Inicia Sesión</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-3">
                <input placeholder="Correo Electrónico" id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input placeholder="Contraseña" id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3 login-footer">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Recordar Información
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block">Iniciar Sesión</button>
            </div>
        </form>

        <div class="form-note text-center mt-4">
            ¿Aún no tienes una cuenta? <a href="{{ route('register') }}">Crear Cuenta</a>
        </div>
    </div>
</div>
@endsection
