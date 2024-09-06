@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Detalles de la Orden</title>
@endsection
@section('content')
<!-- START SECTION SHOP -->
<div class="section pt-5">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('mis-ordenes') }}">
                            <i class="ti-shopping-cart-full"></i> Mis Órdenes
                        </a>
                      </li>
                      <li class="nav-item">
                        <form action="{{ route('logout') }}" id="salir" method="post">
                            @csrf
                        </form>
                        <a class="nav-link" href="javascript:void(0);" onclick="document.getElementById('salir').submit();">
                            <i class="ti-lock"></i>Cerrar Sesión
                        </a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card">
                    <div class="card-header">
                        Detalles de Orden #{{$order->order_number}}
                    </div>
                    <div class="card-body">
                        <div class="border p-3 p-md-4 mb-3">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <a href="{{ url('downloadInvoice/' . $order->id) }}" class="btn btn-fill-line">
                                        <i class="far fa-file-pdf"></i> Descargar Comprobante
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive shop_cart_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Producto</th>
                                            <th class="product-price">Precio</th>
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $product)
                                        <tr>
                                            <td class="product-name" data-title="Producto">{{ $product->name }}</td>
                                            <td class="product-price" data-title="Precio">${{ $product->price }}</td>
                                            <td class="product-quantity" data-title="Cantidad">{{ $product->pivot->quantity }}</td>
                                            <td class="product-subtotal" data-title="Total">${{$product->pivot->quantity * $product->price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="border p-3 p-md-4">
                                    <h6 class="mb-3">Total de la Compra</h6>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Subtotal</td>
                                                    <td class="cart_subtotal_amount">${{ number_format($order->subtotal, 2, '.', ',') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">IVA</td>
                                                    <td class="cart_tax_amount">${{ number_format($order->tax, 2, '.', ',') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong>${{ number_format($order->total, 2, '.', ',') }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>   
                                </div>                         
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- END SECTION SHOP -->
@endsection