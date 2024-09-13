<div id="sizes-container">
    @if(isset($product))
        @foreach($product->sizes as $size)
            <div class="row mb-1 size-item">
                <div class="col-md-5 form-group">
                    <input type="text" required name="size[]" class="form-control" value="{{ $size->name }}" placeholder="Agrega una Talla" />
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-size"><i class="far fa-trash-alt"></i> Eliminar</button>
                </div>
            </div>
        @endforeach
    @endif
</div>
<button type="button" id="add-size" class="btn btn-primary">
    <i class="far fa-plus-square"></i> Agregar Talla
</button>
