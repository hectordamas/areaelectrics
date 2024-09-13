@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME') }}  - Filtrar Productos</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('products/search') }}" class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Filtrar Productos Por:
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Nombre</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Marcas</label>
                            <select class="select2 form-control" name="brands[]" multiple>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Categorias</label>
                            <select class="select2 form-control" name="categories[]"  multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                        <h6 class="font-weight-bold text-primary">Filtar por Fecha de Creación</h6>
                                    <hr>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="from" class="font-weight-bold">Desde</label>
                                    <input type="date" class="form-control" name="startDate" />
                                </div>
        
                                <div class="col-md-6 form-group">
                                    <label for="to" class="font-weight-bold">Hasta</label>
                                    <input type="date" class="form-control" name="endDate" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                        <h6 class="font-weight-bold text-primary">Filtar por Rango de Precios</h6>
                                    <hr>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="from" class="font-weight-bold">Desde</label>
                                    <input type="number" class="form-control" name="minPrice" />
                                </div>
            
                                <div class="col-md-6 form-group">
                                    <label for="to" class="font-weight-bold">Hasta</label>
                                    <input type="number" class="form-control" name="maxPrice" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn">
                                <i class="fas fa-search"></i> Filtrar Búsqueda
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection