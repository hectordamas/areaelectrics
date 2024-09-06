@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - {{ $user->name }}</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Información del Usuario #{{$user->id}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <dl>
                                <dt class="text-primary font-weight-bold">Nombre:</dt>
                                <dd>{{ $user->name }}</dd>

                                <dt class="text-primary font-weight-bold">E-Mail:</dt>
                                <dd>{{ $user->email }}</dd>

                                
                                <dt class="text-primary font-weight-bold">Empresa:</dt>
                                <dd>{{ $user->conection ? $user->conection->company : 'No Registrada'}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl>
                                <dt class="text-primary font-weight-bold">RIF - Cedula:</dt>
                                <dd>{{ $user->conection ? $user->conection->identification : 'No Registrado' }}</dd>

                                <dt class="text-primary font-weight-bold">Teléfono:</dt>
                                <dd>{{ $user->conection ? $user->conection->telephone : 'No Registrado'}}</dd>

                                
                                <dt class="text-primary font-weight-bold">Estatus:</dt>
                                <dd>
                                    @if($user->is_active)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>

                        <div class="col-md-4">
                            <dl>
                                <dt class="text-primary font-weight-bold">Dirección de Faturación:</dt>
                                <dd>{{ $user->conection ? $user->conection->billingAddress : 'No Registrado' }}</dd>

                                <dt class="text-primary font-weight-bold">Dirección de Entrega:</dt>
                                <dd>{{ $user->conection ? $user->conection->shippingAddress : 'No Registrado'}}</dd>

                                <dt class="text-primary font-weight-bold">Fecha de Registro:</dt>
                                <dd>{{ $user->created_at->format('d-m-Y h:m a') }}</dd>

                                <dt class="text-primary font-weight-bold">Role:</dt>
                                <dd>{{ $user->role }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('users.index') }}" class="btn btn-primary">
                                <i class="fas fa-reply"></i> Volver a Lista de Usuarios
                            </a>
                            @if($user->conection)
                            <a href="{{ route('conections.show', [ $user->conection->id ]) }}" class="btn btn-success">
                                <i class="fas fa-bell"></i> Ver Solicitud de Usuario
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
