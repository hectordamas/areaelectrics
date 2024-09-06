@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Ordenes</title>
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h5 mb-4 text-gray-800">Inbox de Órdenes</h1>

    <!-- Filtro de Búsqueda -->
    <form action="{{ url('orders') }}" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Buscar por cliente, número de orden...">
        </div>
        <div class="col-md-4">
            <select class="form-control" name="status">
                <option value="">Todos los Estados</option>
                <option value="Por Revisar">Por Revisar</option>
                <option value="En Proceso">En Proceso</option>
                <option value="Enviado">Enviado</option>
                <option value="Finalizada">Finalizada</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-block">Buscar</button>
        </div>
    </form>

    <!-- Lista de Órdenes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Órdenes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Número de Orden</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr class="inbox-item {{ $order->is_read ? '' : 'font-weight-bold table-hover table-secondary' }}">
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>
                                {{ $order->status }}
                            </td>
                            <td>
                                <a href="{{ url('orders/' . $order->id . '/show') }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i> Ver</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay resultados disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer py-3">
            <nav aria-label="Page navigation example">
                {{ $orders->appends(request()->input())->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection