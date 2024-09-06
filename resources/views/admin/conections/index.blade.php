@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME') }} - Solicitudes de Distribuidor Autorizado</title>
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Solicitudes de Distribuidor Autorizado</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solicitudes Recientes</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('conections.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar solicitudes..." value="{{ request()->search }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Email</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($conections as $conection)
                            <tr class="inbox-item {{ $conection->is_read ? '' : 'font-weight-bold table-hover table-secondary' }}">
                                <td>{{ $conection->name }}</td>
                                <td>{{ $conection->company }}</td>
                                <td><a href="mailto:{{ $conection->email }}">{{ $conection->email }}</a></td>
                                <td>{{ $conection->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('conections.show', $conection->id) }}" class="btn btn-primary btn-sm">
                                        Ver Detalles
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay solicitudes disponibles</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer py-3">
            <nav aria-label="Page navigation example">
                {{ $conections->appends(request()->input())->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection
