@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Finalizar Compra</title>
@endsection

@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Finalizar Compra</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Finalizar Compra</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START SECTION SHOP -->
<div class="section pt_small">
	<div class="container">
        @guest
        <div class="row">
            <div class="col-lg-12">
            	<div class="toggle_info">
                	<span><i class="fas fa-user"></i>Ya estás registrado? <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Haz click aquí para iniciar sesión</a></span>
                </div>
                <div class="panel-collapse collapse login_form"  style="max-width: 500px;" id="loginform">
                    <div class="panel-body">
                        <p>Si has comprado con nosotros antes, por favor ingresa tus datos a continuación. Si eres un nuevo cliente, por favor procede a tu registro en la sección de "Completa Tu Información".</p>
                    	<form method="post" action="{{ url('loginToOrder') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" required class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo Electrónico">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" required class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                        <label class="form-check-label" for="remember"><span>Recordar Información</span></label>
                                    </div>
                                </div>
                                <a href="{{ route('password.request') }}">Olvidaste tu Contraseña?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Iniciar Sesión y Finalizar compra</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        @endguest

        <form class="row" action="{{ url('registerToOrder') }}" method="POST">
            @csrf
            @guest
        	<div class="col-md-6">
            	<div class="heading_s1">
            		<h4>Completa tu Información</h4>
                </div>
                <div>
                    <div class="form-group">
                        <input type="text" required class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre Completo *">
                        
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" required placeholder="Dirección *">
                        
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('telephone') is-invalid @enderror" required type="text" name="telephone" placeholder="Teléfono *">
                        
                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" required type="text" name="email" placeholder="Correo Electrónico *">
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('password') is-invalid @enderror" required type="password" placeholder="Contraseña" name="password" >
                        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            @endguest


            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Tu Orden</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $item)
                                <tr>
                                    <td> {{$item->name}} <span class="product-qty">x {{$item->qty}} </span></td>
                                    <td>${{ $item->qty * $item->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">${{ Cart::subtotal() }}</td>
                                </tr>
                                <tr>
                                    <th>IVA</th>
                                    <td class="product-tax">${{ Cart::tax() }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">${{ Cart::total() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @auth
                        <a href="{{ url('checkout') }}" class="btn btn-fill-out btn-block">
                            <i class="icon-basket-loaded"></i> Finalizar Compra
                        </a>   
                    @else     
                        <button type="submit" class="btn btn-fill-out btn-block">
                            <i class="icon-basket-loaded"></i> Finalizar Compra
                        </button>                
                    @endauth
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection