@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Orden #{{$order->order_number}}</title>
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Detalles de la Orden #{{ $order->order_number }}</h1>

    <!-- Estado de la orden -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Estado de la Orden</h6>
            <a href="{{ url('downloadInvoice/' . $order->id) }}" class="btn btn-primary">
                <i class="far fa-file-pdf"></i> Descargar PDF
            </a>
        </div>
        <div class="card-body">
            <form action="{{ url('orders/' . $order->id . '/update') }}" method="POST">
                @csrf
                <div class="col-md-6 form-group">
                    <label for="status">Cambiar Estado</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Por Revisar" {{ $order->status == 'Por Revisar' ? 'selected' : '' }}>Por Revisar</option>
                        <option value="En Proceso" {{ $order->status == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="Enviado" {{ $order->status == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                        <option value="Entregado" {{ $order->status == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                        <option value="Finalizada" {{ $order->status == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
                        <option value="Cancelada" {{ $order->status == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Actualizar Estado</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Detalles del Cliente -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detalles del Cliente</h6>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Nombre:</strong> {{ $order->user->name }}</li>
                <li><strong>Email:</strong> {{ $order->user->email }}</li>
                <li><strong>Teléfono:</strong> {{ $order->user->conection ? $order->user->conection->telephone : 'No registrado'}}</li>
                <li><strong>Empresa:</strong> {{ $order->user->conection ? $order->user->conection->company : 'No registrado' }}</li>
                <!-- Agrega otros detalles del cliente que sean relevantes -->
            </ul>
        </div>
    </div>

    <!-- Detalles de la orden -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Productos en la Orden</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="table-dark bg-primary">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td class="text-primary">{{ $product->name }}</td>
                                <td class="text-primary">{{ $product->pivot->quantity }}</td>
                                <td class="text-primary">${{ number_format($product->price, 2, '.', ',') }}</td>
                                <td class="text-primary">${{ number_format($product->price * $product->pivot->quantity, 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-dark bg-primary">
                        <tr>
                            <th colspan="3" class="text-right">Subtotal</th>
                            <th>${{ number_format($order->subtotal, 2, '.', ',') }}</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">IVA</th>
                            <th>${{ number_format($order->tax, 2, '.', ',') }}</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Total</th>
                            <th>${{ number_format($order->total, 2, '.', ',') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
