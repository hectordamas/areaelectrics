@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Orden Completada</title>
@endsection

@section('content')

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-check-circle"></i>
                  	
                    <h3>¡Tu pedido ha sido completado!</h3>
                  	
                    <p>¡Gracias por tu compra! Estamos procesando tu pedido y estará listo en un plazo de 3 a 6 horas. Recibirás un correo electrónico de confirmación una vez que tu pedido haya sido completado.</p>
                    
                    <a href="{{ url('tienda-en-linea') }}" class="btn btn-fill-out">
                        Continuar Comprando
                    </a>
                    <a href="{{ url('mis-ordenes') }}" class="btn btn-fill-line">
                        Ver Mis Órdenes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection