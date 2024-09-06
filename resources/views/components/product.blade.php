<div class="product_box text-center">
    <div class="product_img">
        <a href="{{ url('nuestros-productos/' . $product->slug) }}">
            @if($product->images()->first())
                <img src="{{ getImageUrl($product->images()->first()->url) }}" alt="Imagen del Producto: {{ $product->name }} en Fiber Solutions">
            @endif 
        </a>
        <div class="product_action_box">
            <a href="{{ url('nuestros-productos/' . $product->slug) }}" class="btn btn-sm btn-dark btn-radius see-more"> 
                <i class="far fa-eye"></i> Ver Más
            </a>
        </div>
    </div>
    <div class="product_info">
        <h6 class="product_title"><a href="{{ url('nuestros-productos/' . $product->slug) }}">{{ $product->name }}</a></h6>
        @auth
        <div class="product_price">
            <span class="price">${{ number_format($product->price, 2, ',', '.') }}</span>
            <del>${{ number_format($product->price * 1.10, 2, ',', '.') }}</del>
        </div>
        @endauth
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
            @auth
            <button data-id="{{ $product->id }}" class="btn btn-fill-out btn-sm btn-radius addToCartWithQty">
                <i class="icon-basket-loaded" style="font-size:20px;"></i> <span style="font-size:13px;">Añadir al Carrito</span>
            </button>
            @else   
            <a href="{{ url('login') }}" class="btn btn-sm btn-fill-out btn-radius">
                <span>
                    <i class="icon-basket-loaded" style="font-size:20px;"></i> <span class="small text-uppercase" style="font-weight: 600; letter-spacing: 1px;">Inicia Sesión</span> 
                </span>
            </a>
            @endauth
        </div>
    </div>
</div>