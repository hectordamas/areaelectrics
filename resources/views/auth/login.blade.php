@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Iniciar Sesión</title>
<meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
@endsection
@section('content')
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Inicia Sesión</h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input placeholder="Correo Electrónico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input  class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember"><span>Recordar Información</span></label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Olvidé mi Contraseña
                                </a>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Iniciar Sesión</button>
                            </div>
                        </form>
                        <div class="form-note text-center">Aún no tienes una cuenta? <a href="{{ route('register') }}">Crear Cuenta</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
