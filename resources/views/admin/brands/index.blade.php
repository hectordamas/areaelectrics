@extends('layouts.admin')
@section('title')
<title>Fiber Solutions - Lista de Marcas</title>
@endsection

@section('content')
<div class="modal fade"  id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" class="modal-content deleteBrandForm">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title">Eliminar Marca</h5>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                   Marcas Registradas
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <a href="{{ url('brands/create') }}" class="btn btn-primary">
                                <i class="fas fa-tags"></i> Crear Nueva Marca
                            </a>
                        </div>
                    </div>


                    <div class="row no-gutters" id="sortable-brands">                
                        @foreach($brands as $brand)
                        <div class="col-md-3 brand-item" data-id="{{ $brand->id }}">
                            <div class="card bg-primary shadow mb-3 mr-1 h-100">
                                <div class="card-body py-2">
                                    <div class="row d-flex" style="justify-content: space-between; align-items: center;">
                                        <h6 class="text-light pl-2 mb-0" style="max-width: 60%;">{{ $brand->name }}</h6>

                                        <div>
                                            <a href="{{ url('brands/' . $brand->id . '/edit') }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteBrandButton" data-toggle="modal" data-target="#deleteBrandModal" data-id="{{ $brand->id }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection