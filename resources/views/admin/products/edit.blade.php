@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME') }} - Editar Producto</title>
@endsection

@section('content')
<div class="modal fade" id="ImageModal" tabindex="-1" aria-labelledby="ImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title font-weight-bold" id="ImageModalLabel">Cargar Imagen</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row" id="dropzone_container">
                <div class="col-md-12">
                    <form action="{{ url('image-upload') }}" enctype="multipart/form-data" method="post" class="dropzone" id="dropzone">
                        <div class="dz-message text-center">
                            <i class="fas fa-images" style="font-size:30px; margin-bottom:20px;"></i>
                            <h6>Arrastra tus imágenes o haz click aquí para seleccionarlas</h6>
                        </div>
                        @csrf
                        <input type="file" name="file" multiple accept="image/*" style="display: none;"/>
                    </form>   
                </div>
            </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="CategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ url('categories/store') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header">
          <h6 class="modal-title font-weight-bold" id="CategoryLabel">Registrar una Categoría</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
            <div class="col-md-12 form-group">
                <label for="name" class="font-weight-bold">Nombre</label>
                <input type="text" class="form-control" name="name" required />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar Categoria</button>
        </div>
      </form>
    </div>
</div>

<div class="modal fade" id="BrandModal" tabindex="-1" aria-labelledby="BrandLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ url('brands/store') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header">
          <h6 class="modal-title font-weight-bold" id="BrandLabel">Registrar una Marca</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
            <div class="col-md-12 form-group">
                <label for="name" class="font-weight-bold">Nombre</label>
                <input type="text" class="form-control" required name="name" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar Marca</button>
        </div>
      </form>
    </div>
</div>

<!-- Eliminar Imagen Modal -->
<form class="modal fade" method="post" id="destroyImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    @csrf
  <input type="hidden" name="image_id" id="image_id">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 text-center">
                <i class="far fa-times-circle text-primary" style="font-size:60px;"></i>
            </div>
            <div class="col-md-12 mt-3">
                <h5 class="text-center text-dark">¿Estás seguro de eliminar esta imagen?</h5>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</form>


<div class="container-fluid">
<!-- Inicia la pestaña -->
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="specifications-tab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications" aria-selected="false">Especificaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sizes-tab" data-toggle="tab" href="#sizes" role="tab" aria-controls="sizes" aria-selected="false">Tallas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="colors-tab" data-toggle="tab" href="#colors" role="tab" aria-controls="colors" aria-selected="false">Colores</a>
                </li>
            </ul>
            <!-- Tab content -->
            <form action="{{ url('products/' . $product->id .'/update') }}" enctype="multipart/form-data" method="POST" class="tab-content" id="productTabsContent">
                @csrf
                <!-- Información General -->
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header text-primary font-weight-bold">
                                    Modificar Producto
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <button type="button" class="btn btn-sm btn-dark mr-1 mb-1" data-toggle="modal" data-target="#CategoryModal"><i class="fas fa-grip-vertical"></i> Nueva Categoría</button>
                                                <button type="button" class="btn btn-sm btn-dark mr-1 mb-1" data-toggle="modal" data-target="#BrandModal"><i class="fas fa-tag"></i> Nueva Marca</button>
                                                <a class="btn btn-sm btn-dark mb-1" href="{{ url('nuestros-productos/' . $product->slug) }}" target="_blank">
                                                    <i class="fas fa-link"></i> Ver Página de Producto
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                        
                                            <div class="col-md-6 form-group">
                                                <label for="categories" class="font-weight-bold">Selecciona una o Varias Categorias</label>
                                                <select class="select2 form-control" name="categories[]" multiple required>
                                                    @foreach($categories->sortBy('name') as $category)
                                                        @php
                                                            $selected = in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '';
                                                        @endphp
                                                        <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        
                                            <div class="col-md-6 form-group">
                                                <label for="brand" class="font-weight-bold">Selecciona una Marca</label>
                                                <select class="select2 form-control" name="brand">
                                                    <option value="">No Aplica</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" @if($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        
                                            <div class="col-md-6 form-group">
                                                <label for="name" class="font-weight-bold">Nombre del Producto</label>
                                                <input type="text" class="form-control" name="name" required value="{{ $product->name }}"/>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="price" class="font-weight-bold">Precio</label>
                                                <input type="number" step="any" class="form-control" name="price" id="price" required value="{{ $product->price }}"/>
                                                <strong class="text-success" id="priceFormat">${{number_format($product->price, 2, '.', ',')}}</strong>
                                            </div>
                                        
                                            <div class="form-group col-md-6">
                                                <label for="description" class="font-weight-bold">Descripción</label>
                                                <textarea rows="6" id="description" class="form-control" name="description" autofocus>{!! $product->description !!}</textarea>
                                                @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Imágenes del Producto</label>
                                                <input type="hidden" name="images" id="imagesArray" />
                                                <button type="button" class="btn btn-dark btn-block" id="imagesButtonModal" data-toggle="modal" data-target="#ImageModal">
                                                    <i class="fas fa-images"></i> Cargar Imágenes
                                                </button>
                                                <span class="text-secondary" id="fileCount"></span>
                                            
                                                <label for="unpublish" class="font-weight-bold mt-3">
                                                    <input type="checkbox" value="Sí" id="hidden"  name="hidden" @if($product->hidden) checked @endif/>
                                                    No Mostrar
                                                </label>
                                            
                                                <div class="row" id="sortable-images">
                                                    @foreach($product->images as $image)
                                                    <div class="col-md-2 image{{$image->id}}">
                                                        <img src="{{ url($image->url) }}" class="w-100" alt="" srcset="">
                                                        <a href="javascript:void(0);" class="text-danger destroy-image" data-id="{{$image->id}}" 
                                                        data-toggle="modal" data-target="#destroyImage">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">YouTube ID</label>
                                                <input type="text" class="form-control" id="youtube_id" name="youtube_id" value="{{ $product->youtube_id }}">
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-lg btn-primary btn">
                                                    Guardar Cambios
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Especificaciones -->
                <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header font-weight-bold text-primary">
                                    Información Adicional
                                </div>
                                <div class="card-body">
                                    @include('components.specifications')
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>

                <div class="tab-pane fade" id="sizes" role="tabpanel" aria-labelledby="sizes-tab">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header font-weight-bold text-primary">
                                    Tallas
                                </div>
                                <div class="card-body">
                                    @include('components.sizes')
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>

                <div class="tab-pane fade" id="colors" role="tabpanel" aria-labelledby="colors-tab">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header font-weight-bold text-primary">
                                    Colores
                                </div>
                                <div class="card-body">
                                    @include('components.colors')
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </form>
        </div>
    </div>
</div>
@endsection