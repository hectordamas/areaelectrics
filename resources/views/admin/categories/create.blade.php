@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Registrar Categoria</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                   Registra una nueva Categoria
                </div>
                <form action="{{ url('categories/store') }}" method="POST" class="card-body">
                    @csrf

                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="name" class="font-weight-bold">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        
                        <div class="col-md-3 form-group">
                            <label for="categories" class="font-weight-bold">Categoría Padre</label>
                            <select class="select2 form-control" name="category" required>
                                <option value="">Selecciona una Categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn">
                                Registrar Categoria
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection