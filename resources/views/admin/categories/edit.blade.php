@extends('layouts.admin')
@section('title')
<title>{{ env('APP_NAME') }} - Editar Categoria</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                   Editar Categoria
                </div>
                <form action="{{ url('categories/'. $category->id .'/update') }}" method="POST" class="card-body">
                    @csrf

                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="name" class="font-weight-bold">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="categories" class="font-weight-bold">Categoría Padre</label>
                            <select class="select2 form-control" name="parent_id">
                                <option value="">Sin categoría padre</option>
                                @foreach ($categories as $cat)
                                    @if ($cat->id != $category->id)
                                        <option value="{{ $cat->id }}" 
                                            {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn">
                                Editar Categoria
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection