@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Recuperar Contraseña</title>
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
        max-width: 450px;
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

    .alert-success {
        text-align: center;
        font-weight: 500;
        font-size: 15px;
        margin-bottom: 20px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="login-container">
    <div class="login-box">
        <h3>Recuperar Contraseña</h3>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group mb-4">
                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}"
                    required placeholder="Ingresa tu Correo Electrónico" autofocus>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block">
                    <i class="fas fa-paper-plane"></i> Enviar Link de Recuperación
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
