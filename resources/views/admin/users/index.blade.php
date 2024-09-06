@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Todos los Usuarios</title>
@endsection
@section('content')
<div class="modal fade"  id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" class="modal-content deleteUserForm">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="inactive-title">Desactivar Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5>¿Estás seguro de ejecutar esta acción?</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid">
    <h1 class="h5 mb-4 text-gray-800">Usuarios Registrados</h1>

    <!-- Lista de Órdenes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.handle') }}" class="table-responsive usersHandle">
                @csrf
                <div class="row pb-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-user-times"></i> Activar / Desactivar Seleccionados
                        </button>
                    </div>
                </div>

                <table class="table table-bordered datatable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>E-Mail</th>
                            <th>Fecha de Registro</th>
                            <th>Status</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                            <th>
                                <input type="checkbox" id="checkAll">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge {{ $user->is_active ? 'badge-success' : 'badge-danger' }}">
                                    {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>{{$user->role}}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-primary btn-sm">
                                    Ver
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($user->is_active)
                                <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm deleteUserButton" data-active="{{ $user->is_active }}" data-id="{{ $user->id }}" data-toggle="modal" data-target="#deleteUserModal">
                                    <i class="fas fa-user-times"></i>
                                </a>
                                @else
                                <a href="javascript:void(0);" class="btn btn-outline-primary btn-sm deleteUserButton" data-active="{{ $user->is_active }}" data-id="{{ $user->id }}" data-toggle="modal" data-target="#deleteUserModal">
                                    <i class="fas fa-user-plus"></i>
                                </a>
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" class="checkOne" name="usersId[]" value="{{ $user->id }}">
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay resultados disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection