@extends('layouts.app')

@section('metadata')
    <title>{{ env('APP_NAME') }} - Venta de productos de iluminación, computación, redes, automotriz, Cerco Eléctrico</title>
    <meta name="description" content="Tienda en Línea y distribuidor mayorista de Productos de redes, fibra óptica, cable utp, seguridad, cctv, iluminación, entre otros.">
    <meta name="keywords" content="router, modem, redes, red, cable, cables, cable utp, fibra óptica, iluminación, tienda en línea, distribuidor mayorista, seguridad, cctv, marcas, wireplus, ledplus, tp-link, mercusys, cable utp">
    <style>
        .owl-carousel .owl-stage{
            display: flex;
        }
        .item {
            height:100%;
        }
    </style>
@endsection

@section('content')
<!-- START SECTION BANNER -->
<div class="banner_section slide_wrap shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg" data-img-src="{{ getImageUrl('assets/images/banner9.png') }}">
                <div class="banner_slide_content banner_content_inner">
                	<div class="container">
                    	<div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-9 col-10">
                                <div class="banner_content2">
                                    <h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase" data-animation="fadeInDown" data-animation-delay="0.2s">Todo En Redes</h6>
                                    <h3 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s">Equipos y Accesorios de Redes.</h3>
                                    <p class="staggered-animation text-dark" style="font-weight:500;" data-animation="fadeInUp" data-animation-delay="0.4s">Encuentra routers, switches, cableado UTP, y conectores para tus instalaciones.</p>
                                    <a class="btn btn-fill-line btn-radius staggered-animation text-uppercase" style="font-weight:500;"  href="{{ url('tienda-en-linea') }}" data-animation="fadeInUp" data-animation-delay="0.5s">Ver Productos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="{{ getImageUrl('assets/images/banner8.png') }}">
                <div class="banner_slide_content banner_content_inner">
                	<div class="container">
                    	<div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-9 col-10">
                                <div class="banner_content2">
                                    <h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase" data-animation="fadeInDown" data-animation-delay="0.2s">Fibra Óptica</h6>
                                    <h3 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s">Todo para tus Instalaciones</h3>
                                    <p class="staggered-animation text-dark" style="font-weight:500;" data-animation="fadeInUp" data-animation-delay="0.4s">Conectores, cables y herramientas. Envío rápido y compra segura.</p>
                                    <a class="btn btn-fill-line btn-radius staggered-animation text-uppercase" style="font-weight:500;"  href="{{ url('nuestras-categorias/fibra-optica-2') }}" data-animation="fadeInUp" data-animation-delay="0.5s">Explorar Fibra Óptica</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="{{ getImageUrl('assets/images/banner10.png') }}">
                <div class="banner_slide_content banner_content_inner">
                	<div class="container">
                    	<div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-9 col-10">
                                <div class="banner_content2">
                                    <h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase" data-animation="fadeInDown" data-animation-delay="0.2s">Iluminación LED</h6>
                                    <h3 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s">Paneles y reflectores modernos.</h3>
                                    <p class="staggered-animation text-dark" style="font-weight:500;" data-animation="fadeInUp" data-animation-delay="0.4s">Ilumina tus espacios con productos LED eficientes y modernos. Ideales para hogar o negocio.</p>
                                    <a class="btn btn-fill-line btn-radius staggered-animation text-uppercase" style="font-weight:500;"  href="{{ url('nuestras-categorias/iluminacion-9') }}" data-animation="fadeInUp" data-animation-delay="0.5s">Ver Iluminación</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ol class="carousel-indicators indicators_style2">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleControls" data-slide-to="1"></li>
            <li data-target="#carouselExampleControls" data-slide-to="2"></li>
        </ol>
    </div>
</div>
<!-- END SECTION BANNER -->


<!-- END MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHIPPING INFO -->
    <div class="section small_pb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>Ofertas de la Semana</h4>
                        </div>
                        <div class="view_all">
                            <a href="{{ url('tienda-en-linea') }}" class="text_default"><i class="linearicons-power"></i> <span>Ver Más</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="false" data-dots="true" data-nav="false" data-margin="10" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @foreach($products as $product)
                            <div class="item">
                                @include('components.product')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- END SECTION SHIPPING INFO -->

    <!-- START SECTION BANNER --> 
    <div class="section pb_20 small_pt">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 mb-3">
                    <img src="{{ getImageUrl('assets/images/banner-a.png') }}" class="rounded" alt="">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ getImageUrl('assets/images/banner-b.png') }}" class="rounded" alt="">

                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ getImageUrl('assets/images/banner-c.png') }}" class="rounded" alt="">

                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
    
    <!-- START SECTION SHOP -->
    <div class="section small_pt">
    	<div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>Productos Recientes</h4>
                        </div>
                        <div class="view_all">
                            <a href="{{ url('tienda-en-linea') }}" class="text_default"><i class="linearicons-power"></i> <span>Ver Más</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
                	<div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="false" data-dots="true" data-nav="false" data-margin="10" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @foreach($latestProducts as $product)
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

</div>
<!-- END MAIN CONTENT -->
@endsection


