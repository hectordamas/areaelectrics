<div class="product border-0 rounded-0 product_box text-center">
    <div class="product_img" style="cursor: pointer;" onclick="window.open('{{ url('nuestros-productos/' . $product->slug) }}', '_self')">
        <a href="{{ url('nuestros-productos/' . $product->slug) }}">
            @if($product->images()->first())
                <img src="{{ getImageUrl($product->images()->first()->url) }}" alt="Imagen del Producto: {{ $product->name }} en Fiber Solutions">
            @endif 
        </a>
    </div>
    <div class="product_info">
        <h6 class="product_title"><a href="{{ url('nuestros-productos/' . $product->slug) }}">{{ $product->name }}</a></h6>
        <div class="product_price">
            <span class="price">${{ number_format($product->price, 2, ',', '.') }}</span>
            <del>${{ number_format($product->price * 1.10, 2, ',', '.') }}</del>
        </div>
        <div class="rating_wrap">
            <div class="rating">
                <div class="product_rate" style="width:100%"></div>
            </div>
            <span class="rating_num">({{ rand(1, 3) }})</span>
        </div>

        <div class="pr_desc">
            <p>{!! $product->description !!}</p>
        </div>
        <div class="add-to-cart">
            <a 
                data-id="{{ $product->id }}" 
                @if($product->colors->count() > 0 || $product->colors->count() > 0)
                    href="{{ url('nuestros-productos/' . $product->slug) }}" 
                @else
                    href="javascript:void(0);"
                @endif

                class="btn btn-fill-out btn-radius btn-block btn-sm 
                    @if(!$product->colors->count() > 0 || !$product->colors->count() > 0) addToCartWithQty @endif
                ">
                <i class="icon-basket-loaded" style="font-size: 20px;"></i> Agregar al Carrito
            </a>
        </div>
    </div>
</div>