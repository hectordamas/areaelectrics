<div class="product border">
    <div class="product_img" style="cursor: pointer;" onclick="window.open('{{ url('nuestros-productos/' . $product->slug) }}', '_self')">
        <a href="{{ url('nuestros-productos/' . $product->slug) }}">
            @if($product->images()->first())
                <img src="{{ getImageUrl($product->images()->first()->url) }}" alt="Imagen del Producto: {{ $product->name }} en Fiber Solutions">
            @endif 
        </a>
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

    </div>
</div>