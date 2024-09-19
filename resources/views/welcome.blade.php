@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Juguetes Sexuales y Lencería en Venezuela | Rompe el Tabú</title>
<meta name="description" content="Encuentra los mejores juguetes sexuales, lencería y productos para adultos en Venezuela. {{ env('APP_NAME') }} te ofrece discreción, calidad y envíos a nivel nacional. Rompe el tabú y vive nuevas experiencias.">
<meta name="keywords" content="juguetes sexuales, lencería, sex shop, vibradores, placer, juguetes para adultos, tienda en línea, productos eróticos, Venezuela, discreción, envío nacional">
<meta property="og:title" content="{{ env('APP_NAME') }} - Juguetes Sexuales y Lencería en Venezuela">
<meta property="og:description" content="Descubre juguetes sexuales, lencería y productos para adultos en nuestra tienda en línea. Discreción garantizada y envíos a nivel nacional. Rompe el tabú con {{ env('APP_NAME') }}.">
<meta property="og:image" content="{{ asset('assets/images/logo_dark.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
@endsection
@section('content')
<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg" data-img-src="{{ asset('assets/images/banner4.jpg') }}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase animated fadeInDown" data-animation="fadeInDown" data-animation-delay="0.2s" style="animation-delay: 0.2s; opacity: 1;">Descubre Nuevas Sensaciones</h6>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.4s">Rompe el Tabú</h2>
                                    <p class="staggered-animation text-dark animated fadeInUp" style="font-weight: 500; animation-delay: 1s; opacity: 1;" data-animation="fadeInUp" data-animation-delay="0.4s">Encuentra los mejores juguetes sexuales en nuestra Tienda en Línea, y dale rienda suelta a tus deseos.</p>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ url('tienda-en-linea') }}" data-animation="slideInLeft" data-animation-delay="1.5s">Explorar Productos</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="{{ asset('assets/images/banner5.jpg') }}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-md-block"></div>
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden text-right">
                                    <h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase animated fadeInDown" data-animation="fadeInDown" data-animation-delay="0.2s" style="animation-delay: 0.2s; opacity: 1;">Placer a tu alcance</h6>
                                    <h2 class="staggered-animation" data-animation="slideInRight" data-animation-delay="0.4s">
                                        Eleva tu Intimidad
                                    </h2>
                                    <p class="staggered-animation text-dark animated fadeInUp" style="font-weight: 500; animation-delay: 1s; opacity: 1;" data-animation="fadeInUp" data-animation-delay="0.4s">Con Airanza Sex Shop el placer está al alcance de tu mano. Rompe el Tabú y experimenta con tu cuerpo</p>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ url('tienda-en-linea') }}" data-animation="slideInRight" data-animation-delay="1.5s">
                                        Conoce Más
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="assets/images/banner6.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                    <h6 class="mb-2 mb-sm-3 staggered-animation text-uppercase animated fadeInDown" data-animation="fadeInDown" data-animation-delay="0.2s" style="animation-delay: 0.2s; opacity: 1;">Seducción y Estilo</h6>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.4s">Lencería para Cada Momento</h2>
                                    <p class="staggered-animation text-dark animated fadeInUp" style="font-weight: 500; animation-delay: 1s; opacity: 1;" data-animation="fadeInUp" data-animation-delay="0.4s">Conoce toda la colección de lencería que tenemos para ti</p>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ url('nuestras-categorias/lenceria-1') }}" data-animation="slideInLeft" data-animation-delay="1.5s">Ver Colección</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
        <ol class="carousel-indicators indicators_style1">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleControls" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleControls" data-slide-to="2" class=""></li>
        </ol>
    </div>
</div>
<!-- END SECTION BANNER -->


<!-- END MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section small_pb">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s3 text-center">
                    <h2>Productos Destacados</h2>
                </div>
                <div class="small_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style4" data-loop="true" data-dots="false" data-nav="true" data-margin="10" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    @foreach ($products as $product)
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

<!-- START SECTION BANNER --> 
<div class="section pb_20 small_pt">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="single_banner">
                	<img src="{{ asset('assets/images/shop_banner_img1.jpg') }}" alt="Banner de Vibradores">
                    <div class="single_banner_info">
                        <h6 class="single_bn_title1">Categoría Destacada</h6>
                        <h3 class="single_bn_title">Vibradores</h3>
                        <a href="{{ url('nuestras-categorias/vibradores-3') }}" class="btn btn-fill-out btn-sm btn-radius">Ver Más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="single_banner">
                	<img src="{{ asset('assets/images/shop_banner_img2.jpg') }}" alt="Banner de consoladores">
                    <div class="fb_info2">
                        <h6 class="single_bn_title1">Categoría Destacada</h6>
                        <h3 class="single_bn_title">Consoladores</h3>
                        <a href="{{ url('nuestras-categorias/consoladores-7') }}" class="btn btn-fill-out btn-sm btn-radius">Ver Más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER --> 

<!-- START SECTION SHOP -->
<div class="section pb_50 small_pt">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s3 text-center">
                    <h2>Productos Más Recientes</h2>
                </div>
                <div class="small_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style4" data-loop="true" data-dots="false" data-nav="true" data-margin="10" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    @foreach ($latestProducts as $product)
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


