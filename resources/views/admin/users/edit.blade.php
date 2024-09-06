@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Modificar Usuario</title>
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-primary font-weight-bold">
                    Modificar Usuario
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" class="row">
                        @csrf
                        <div class="col-md-3 form-group">
                            <label for="" class="text-primary font-weight-bold">Nombre</label>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="text-primary font-weight-bold">E-Mail</label>
                            <input type="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="E-Mail">
                        </div>
        
                        <div class="col-md-3 form-group">
                            <label for="" class="text-primary font-weight-bold">Empresa</label>
                            <input type="text" value="{{ $user->conection ? $user->conection->company : '' }}" class="form-control" name="company" placeholder="Empresa">
                        </div>
                        
                        <div class="col-md-3 form-group">
                            <label for="" class="text-primary font-weight-bold">Telefono</label>
                            <input type="text" value="{{ $user->conection ? $user->conection->telephone : '' }}" class="form-control" name="telephone" placeholder="Telefono">
                        </div>
        
                        <div class="col-md-3 form-group">
                            <label for="" class="text-primary font-weight-bold">RIF - Cedula</label>
                            <input type="text" value="{{ $user->conection ? $user->conection->identification : '' }}" class="form-control" name="identification" placeholder="V0000000">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="billingAddress" class="text-primary font-weight-bold">Dirección de Faturación</label>
                            <input type="text" value="{{ $user->conection ? $user->conection->billingAddress : '' }}" required class="form-control" name="billingAddress">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="shippingAddress" class="text-primary font-weight-bold">Dirección de Envío</label>
                            <input type="text" value="{{ $user->conection ? $user->conection->shippingAddress : '' }}" required class="form-control" name="shippingAddress">
                        </div>
        
                        <div class="col-md-3 form-group">
                            <label for="" class="text-primary font-weight-bold">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="role" class="text-primary font-weight-bold">Rol</label>
                            <select name="role" id="role" class="form-control">
                                <option value="Usuario" @if($user->role == 'Usuario') selected @endif>Usuario</option>
                                <option value="Administrador" @if($user->role == 'Administrador') selected @endif>Administrador</option>
                            </select>
                        </div>
        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Editar</button>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">
                                <i class="fas fa-reply"></i> Volver a Lista de Usuarios
                            </a>
                        </div>
                    </form>
        
                </div>
            </div>

        </div>
    </div>

</div>
@endsection