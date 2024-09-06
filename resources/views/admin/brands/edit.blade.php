@extends('layouts.admin')
@section('title')
<title>Fiber Solutions - Modificar Marca</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                   Modificar Marca
                </div>
                <form action="{{ url('brands/'.$brand->id. '/update') }}" method="POST" class="card-body">
                    @csrf

                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="name" class="font-weight-bold">Nombre de la Marca</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $brand->name }}">
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn">
                                Editar Marca
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
