@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Mis Ordenes</title>
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
                        <a class="nav-link active" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i> Mis Órdenes</a>
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
                <div class="tab-content dashboard_content">
                  	<div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Mis Órdenes</h3>
                            </div>
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fecha</th>
                                                <th>Status</th>
                                                <th>Total Mayor</th>
                                                <th>Total Detal</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td>#{{ $order->order_number }}</td>
                                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>${{ number_format($order->total, 2, '.', ',') }}</td>
                                                <td>${{ number_format($order->totalDetal, 2, '.', ',') }}</td>
                                                <td>
                                                    <a href="{{ url('detalles-de-orden/' . $order->id) }}" class="btn btn-fill-out btn-sm">Ver</a>
                                                </td>
                                            </tr>
                                            @endforeach
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
<!-- END SECTION SHOP -->
@endsection