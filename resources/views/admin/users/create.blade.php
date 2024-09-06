@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Registrar Usuario</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3 text-primary font-weight-bold">
                    Registrar Usuario
                </div>
                <div class="card-body">
                    <form class="row" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-3">
                            <label for="name" class="text-primary font-weight-bold">Nombre</label>
                            <input type="text" required class="form-control" name="name">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="email" class="text-primary font-weight-bold">E-Mail</label>
                            <input type="email" required class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="password" class="text-primary font-weight-bold">Contraseña</label>
                            <input type="password" required class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="identification" class="text-primary font-weight-bold">Cedula - RIF</label>
                            <input type="text" required class="form-control" name="identification">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="company" class="text-primary font-weight-bold">Empresa</label>
                            <input type="text" required class="form-control" name="company">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telephone" class="text-primary font-weight-bold">Telefono</label>
                            <input type="text" required class="form-control" name="telephone">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="billingAddress" class="text-primary font-weight-bold">Dirección de Faturación</label>
                            <input type="text" required class="form-control" name="billingAddress">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="shippingAddress" class="text-primary font-weight-bold">Dirección de Envío</label>
                            <input type="text" required class="form-control" name="shippingAddress">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="role" class="text-primary font-weight-bold">Rol</label>
                            <select name="role" id="role" class="form-control">
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection