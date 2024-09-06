<div id="specifications-container">
    @if(isset($product))
        @foreach($product->specifications as $specification)
            <div class="row mb-1 specification-item">
                <div class="col-md-5 form-group">
                    <input type="text" required name="item[]" class="form-control" value="{{ $specification->item }}" placeholder="Ítem" />
                </div>
                <div class="col-md-5 form-group">
                    <input type="text" required name="specDescription[]" class="form-control" value="{{ $specification->description }}" placeholder="Descripción" />
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-specification"><i class="far fa-trash-alt"></i> Eliminar</button>
                </div>
            </div>
        @endforeach
    @endif
</div>
<button type="button" id="add-specification" class="btn btn-primary">
    <i class="far fa-plus-square"></i> Agregar Especificación
</button>
