<div id="colors-container">
    @if(isset($product))
        @foreach($product->colors as $color)
            <div class="row mb-1 color-item">
                <div class="col-md-3 form-group">
                    <input type="color" required name="color[]" class="form-control" value="{{ $color->name }}"/>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-color"><i class="far fa-trash-alt"></i> Eliminar</button>
                </div>
            </div>
        @endforeach
    @endif
</div>
<button type="button" id="add-color" class="btn btn-primary">
    <i class="far fa-plus-square"></i> Agregar Color
</button>
