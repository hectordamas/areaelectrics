@extends('layouts.admin')

@section('title')
<title>{{ env('APP_NAME') }}  - Resultados de Consulta Productos</title>
@endsection

@section('content')
<div class="modal fade"  id="importExcelModal" tabindex="-1" role="dialog" aria-labelledby="importExcelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ url('excel_import') }}" class="modal-content" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title">Seleccionar Archivo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="excel_file">Importar Archivo .xls, .xlsx</label>
                        <input type="file" name="excel_file" id="excel_file" accept=".csv, .xls, .xlsx">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Importar Archivo</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade"  id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" class="modal-content deleteProductForm">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title">Eliminar Producto</h5>
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
                    Resultados de la búsqueda
                </div>
                <form class="card-body handleProducts" method="POST" action="{{ url('products/handle') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" data-toggle="modal" data-target="#importExcelModal" class="btn btn-sm btn-primary mb-2">
                                <i class="far fa-file-excel"></i> Importar Productos
                            </button>
                            <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger mb-2">
                                <i class="fas fa-trash"></i> Eliminar Seleccionados
                            </button>
                            <a href="{{ url('excel_export') }}" class="btn btn-sm btn-success mb-2">
                                <i class="far fa-file-excel"></i> Descargar en Excel
                            </a>
                        </div>
                    </div>

                    <table class="table table-striped table-sm datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                                <th>
                                    <input type="checkbox" id="checkAll" >
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{$product->brand ? $product->brand->name : 'N/A' }}</td>
                                    <td class="font-weight-bold text-success">
                                        ${{ number_format($product->price, 2, '.', ',') }}
                                    </td>
                                    <td>
                                        <a href="{{ url('products/' . $product->id . '/edit') }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteProductButton" data-toggle="modal" data-target="#deleteProductModal" data-id="{{ $product->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>                                    
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkOne" name="productId[]" value="{{ $product->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection