@extends('layouts.admin')

@section('title')
    <title>{{ env('APP_NAME') }} - Solicitud #{{ $conection->id }}</title>
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Detalles de la Solicitud #{{ $conection->id }}</h1>

    <div class="row">
        <div class="col-md-12">
            <!-- Información de la solicitud -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Información de la Solicitud</h6>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9">{{ $conection->name }}</dd>
                    
                        <dt class="col-sm-3">Empresa:</dt>
                        <dd class="col-sm-9">{{ $conection->company }}</dd>
                    
                        <dt class="col-sm-3">Identificación:</dt>
                        <dd class="col-sm-9">{{ $conection->identification }}</dd>
                    
                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9"><a target="_blank" href="mailto:{{ $conection->email }}">{{ $conection->email }}</a></dd>
                    
                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9">{{ $conection->telephone }}</dd>

                        <dt class="col-sm-3">Dirección de Facturación:</dt>
                        <dd class="col-sm-9">{{ $conection->billingAddress }}</dd>

                        <dt class="col-sm-3">Dirección de Envio:</dt>
                        <dd class="col-sm-9">{{ $conection->shippingAddress }}</dd>
                    
                        <dt class="col-sm-3">Mensaje:</dt>
                        <dd class="col-sm-9">{{ $conection->message }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <!-- Acción de aprobación -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Acción de Aprobación</h6>
                </div>
                <div class="card-body">
                    @if(!$conection->user_id && !$userExists)
                        @if(session('error'))
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('conections.approve', $conection->id) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Asignar Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required minlength="8" placeholder="Ingresa una contraseña segura">
                                <div class="invalid-feedback">
                                    La contraseña es obligatoria y debe tener al menos 8 caracteres.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-check"></i> Aprobar y Crear Usuario
                            </button>
                        </form>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Esta solicitud ya ha sido aprobada y el usuario ha sido creado.
                        </div>
                        <a href="{{ route('users.show', [ $conection->user_id ]) }}" class="btn btn-success btn-block mt-2">
                            <i class="fas fa-user-alt"></i> Ver Detalles de Usuario
                        </a>
                    @endif
                    
                    <a href="{{ route('conections.index') }}" class="btn btn-primary btn-block mt-2">
                        <i class="fas fa-arrow-left"></i> Volver a Solicitudes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
