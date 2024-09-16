@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Carrito de Compras</title>
<meta name="description" content="Tienda en Línea y distribuidor mayorista de Productos de redes, fibra óptica, cable utp, seguridad, cctv, iluminación, entre otros.">
<meta name="keywords" content="redes, red, cable, cables, cable utp, fibra óptica, iluminación, tienda en línea, distribuidor mayorista, seguridad, cctv, marcas, wireplus, ledplus, tp-link, mercusys, cable utp">
@endsection
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Carrito de Compras</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Carrito de Compras</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="section pt-5">
    @if(Cart::count() > 0)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                	<table class="table">
                    	<thead class="table-dark">
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Producto</th>
                                <th class="product-size">Talla</th>
                                <th class="product-color">Color</th>
                                <th class="product-price">Precio</th>
                                <th class="product-quantity">Cantidad</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-edit">Editar</th>
                                <th class="product-delete">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $item)
                        	<tr id="tr{{$item->rowId}}" data-id="{{$item->id}}" data-rowid="{{$item->rowId}}" id="tr{{$item->rowId}}">
                                <input type="hidden" id="qty-input{{$item->rowId}}" value="{{$item->qty}}">

                            	<td class="product-thumbnail">
                                    <a href="#"><img src="{{ isset($item->options['image']) ? $item->options['image'] : null }}" alt="product1"></a>
                                </td>
                                <td class="product-name" data-title="Producto"><a href="#">{{ $item->name }}</a></td>
                                <td class="product-size" data-title="Talla"><a href="#">{{ isset($item->options['size']) ? $item->options['size'] : 'N/A' }}</a></td>
                                <td class="product-color" data-title="Color">
                                    @if(isset($item->options['color']))
                                        <div href="#" class="ml-auto mx-md-auto" style="background-color: {{ $item->options['color'] }}; width: 20px; height: 20px; border-radius: 100%;"></div>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="product-price" data-title="Precio">${{ $item->price }}</td>
                                <td class="product-quantity product-quantity-{{$item->rowId}}" data-title="Cantidad">
                                    {{ $item->qty }}
                                </td>
                              	<td class="product-subtotal-{{$item->rowId}}" data-title="Total">${{ $item->qty * $item->price }}</td>
                                <td class="product-edit" data-title="Editar">
                                    <a href="javascript:void(0);" class="btn btn-fill-out btn-sm updateCartItem" data-rowid="{{$item->rowId}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td class="product-delete" data-title="Eliminar">
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm removeCartItem" data-rowid="{{$item->rowId}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="9" class="px-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                            </div>
                                            <div class="col-lg-8 col-md-6 text-left text-md-right">
                                                <a href="{{ url('cart/destroy') }}" class="btn btn-fill-line">
                                                    <i class="icon-basket-loaded" style="font-size:20px;"></i> Vaciar Carrito
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            	<div class="medium_divider"></div>
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
                                    <td class="cart_subtotal_amount">${{ Cart::subtotal() }}</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">IVA</td>
                                    <td class="cart_tax_amount">${{ Cart::tax() }}</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>${{ Cart::total() }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ Auth::check() ? url('checkout') : url('finalizar-compra') }}" class="btn btn-fill-out">Finalizar Orden</a>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center mb-5">
                    <img src="{{ asset('assets/images/empty_cart.png') }}" alt="Carrito Vacío" class="w-100" style="max-width: 150px;">
                </div>
                <div class="col-md-12">
                    <h5 class="text-center">Tu carrito está vacío. Aún no has agregado ningún producto</h5>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection