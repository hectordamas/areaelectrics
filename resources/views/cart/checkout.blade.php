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
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-lg-6">
            	<div class="toggle_info">
                	<span><i class="fas fa-user"></i>Ya estás registrado? <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Haz Click Aqui para Iniciar Sesión</a></span>
                </div>
                <div class="panel-collapse collapse login_form" id="loginform">
                    <div class="panel-body">
                        <p>Si has comprado con nosotros antes, por favor ingresa tus datos a continuación. Si eres un nuevo cliente, por favor procede a tu registro en la sección de "Completa Tu Información".</p>
                    	<form method="post">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="email" placeholder="Username Or Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password" placeholder="Password">
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
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Inicia Sesión</button>
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
        <div class="row">
        	<div class="col-md-6">
            	<div class="heading_s1">
            		<h4>Completa tu Información</h4>
                </div>
                <form method="post">
                    <div class="form-group">
                        <input type="text" required class="form-control" name="name" placeholder="Nombre Completo *">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" required placeholder="Dirección *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="telephone" placeholder="Teléfono *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="email" placeholder="Correo Electrónico *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="password" placeholder="Contraseña" name="password" >
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Tu Orden</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Blue Dress For Woman <span class="product-qty">x 2</span></td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>Lether Gray Tuxedo <span class="product-qty">x 1</span></td>
                                    <td>$55.00</td>
                                </tr>
                                <tr>
                                    <td>woman full sliv dress <span class="product-qty">x 3</span></td>
                                    <td>$204.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">$349.00</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">$349.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <a href="{{ url('checkout') }}" class="btn btn-fill-out btn-block">Finalizar Compra</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection