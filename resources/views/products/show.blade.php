@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - {{ $product->name }}</title>
<meta name="description" content="{{ $product->description }} Compra {{ $product->name }} en nuestra tienda online. Encuentra más productos de {{ $product->brand->name }} y categorías como {{ $product->categories->pluck('name')->join(', ') }}.">
<meta name="keywords" content="{{ $product->name }}, {{ $product->brand->name }}, {{ $product->categories->pluck('name')->join(', ') }}, redes, cable, cables, fibra óptica, iluminación, tienda en línea, distribuidor mayorista, seguridad, cctv, marcas, {{ $product->brand->name }}">
@endsection
@section('content')
<!-- START SECTION SHOP -->
<div class="section pt-5">
	<div class="container">
		<div class="row">
            <div class="col-lg-5 col-md-5 mb-4 mb-md-0">
              <div class="product-image">
                    <div class="product_img_box">
                        @if($product->images()->count() > 0)
                            <img id="product_img" src="{{ getImageUrl($product->images()->first()->url) }}" alt="Imagen de Producto {{ $product->name }}" />
                        @endif
                    </div>
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider justify-content-start" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                        @foreach($product->images as $image)
                            <div class="item">
                                <a href="#" class="product_gallery_item {{$loop->first ? 'active' : ''}}" data-image="assets/images/product_img1.jpg" data-zoom-image="assets/images/product_zoom_img1.jpg">
                                    <img src="{{ getImageUrl($image->url) }}" alt="product_small_img1" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="product_description">
                    <h4 class="product_title">
                        <a href="#" class="text-capitalize">{{ $product->name }}</a>
                    </h4>
                    <div class="product_price">
                        <span class="price" style="font-size: 26px;">${{ number_format($product->price, 2, ',', '.') }}</span>
                        <del>${{ number_format($product->price * 1.10, 2, ',', '.') }}</del>
                    </div>

                    @if($product->colors->count() > 0 || $product->sizes->count() > 0)
                    <hr>
                    @endif

                    @if($product->colors->count() > 0)
                    <div class="pr_switch_wrap form-group">
                        <span class="switch_lable">Color: </span>
                        <div class="product_color_switch">
                            <input type="hidden" id="color" name="color" value="{{ $product->colors->first()->name }}">                            
                            @foreach($product->colors as $color)
                                <span 
                                    class="{{ $loop->first ? 'active' : '' }} selectColor" 
                                    data-color="{{ $color->name }}"></span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($product->sizes->count() > 0)
                    <div class="pr_switch_wrap form-group">
                        <span class="switch_lable">Talla: </span>
                        <div class="product_size_switch">
                            <input type="hidden" id="size" name="size" value="{{ $product->sizes->first()->name }}">
                            @foreach($product->sizes as $size)
                                <span 
                                    class="selectSize" 
                                    data-size="{{ $size->name }}">{{$size->name}}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>

                <hr>

                <div class="cart_extra">
                    <input type="hidden" id="id" name="id" value="{{ $product->id }}">
                    <input type="hidden" id="name" name="name" value="{{ $product->name }}">
                    <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                    <input type="hidden" id="image" name="image" value="{{ $product->images()->first()->url }}">
                    <div class="cart-product-quantity">
                        <div class="quantity">
                            <input type="button" value="-" class="minus">
                            <input type="text" id="quantity" name="quantity" value="1" title="Qty" class="qty" size="4">
                            <input type="button" value="+" class="plus">
                        </div>
                    </div>
                    <div class="cart_btn">
                        <button class="btn btn-fill-out btn-addtocart btn-radius" id="addToCart">
                            <i class="icon-basket-loaded"></i> Añadir al Carrito
                        </button>
                    </div>
                </div>
                <hr>

                <ul class="product-meta">
                    <!--<li>SKU: <a href="#">BE45VGRT</a></li>-->
                    <li>Marca: <a href="{{ url('nuestras-marcas/' . $product->brand->slug) }}">{{ $product->brand->name }}</a></li>
                    <li>Categorías: 
                        @foreach($product->categories as $category)
                            <a href="{{ url('nuestras-categorias/' . $category->slug) }}" rel="tag">{{ $category->name }}</a>@if(!$loop->last), @endif
                        @endforeach
                    </li>                    
                </ul>

                <div class="product_share">
                    <span>Compartir en:</span>
                    <ul class="social_icons">
                        <li>
                            <a target="_blank" href="https://wa.me/?text={{ urlencode(request()->url()) }}">
                                <i style="font-size: 20px;" class="ion-social-whatsapp"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}">
                                <i style="font-size: 20px;" class="ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="#" onclick="alert('Copia y pega este enlace en tu historia de Instagram: {{ request()->url() }}');">
                                <i style="font-size: 20px;" class="ion-social-instagram-outline"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://x.com/intent/tweet?url={{ urlencode(request()->url()) }}">
                                <i style="font-size: 20px;" class="ion-social-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Descripción</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Información Adicional</a>
                      	</li>
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                            {!! $product->description !!}
                        </div>
                      	<div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                            <table class="table table-bordered">
                                @forelse($product->specifications as $spec)
                                <tr>
                                    <td>{{ $spec->item }}</td>
                                    <td>{{ $spec->description }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No hay Especificaciones Disponibles</td>
                                </tr>
                                @endforelse
                        	</table>
                      	</div>
                	</div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Productos Relacionados</h3>
                </div>
            	<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    @foreach($relatedProducts as $product)
                        <div class="item">
                            @include('components.product')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection