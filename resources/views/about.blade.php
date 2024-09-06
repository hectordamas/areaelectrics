@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Acerca de Fiber Solutions</title>
<meta name="description" content="Somos una empresa venezolana especializada en la distribución de productos de red, iluminación y fibra óptica. Nos destacamos por ofrecer a nuestros distribuidores autorizados las marcas líderes del mercado venezolano, como Wireplus, TP-Link, Mercusys, Ezviz, Hikvision, entre otras.">
<meta name="keywords" content="nosotros, acerca de, ecommerce, tienda en linea, ezviz, wireplus, fibra optica, redes, mayorista, distribucion, red, iluminacion, cables">
@endsection

@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Nosotros</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Nosotros</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- STAT SECTION ABOUT --> 
<div class="section">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-lg-6">
            	<div class="about_img scene mb-4 mb-lg-0">
                    <img src="{{ asset('assets/images/juguetes-sexuales.jpg') }}" alt="Nosotros: Airanza Sex Shop Imagen"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading_s1">
                    <h2>Acerca de Nosotros</h2>
                </div>
                <p>En Airanza Sex Shop, nos dedicamos a mejorar la vida íntima de nuestros clientes a través de una amplia gama de productos diseñados para el placer y la exploración. Como tienda para adultos, ofrecemos una selección curada de juguetes sexuales tanto para hombres como para mujeres, asegurándonos de incluir opciones para todos los gustos y preferencias.</p>
                <p>Nuestro objetivo es proporcionar todo lo necesario para una experiencia sexual plena y satisfactoria, con un enfoque en la calidad, seguridad y discreción. En Airanza Sex Shop, creemos que la intimidad y el placer son esenciales para una vida equilibrada y feliz, por lo que nos esforzamos en crear un ambiente acogedor y sin juicios para nuestros clientes.</p>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION ABOUT --> 

<!-- START SECTION WHY CHOOSE --> 
<div class="section bg_light_blue2 pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>¿Por qué escogernos?</h2>
                </div>
                <p class="text-center leads">Descubre porqué Airanza Sex Shop es tu mejor opción en productos íntimos:</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-medall"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Calidad y Seguridad</h5>
                        <p>Nos comprometemos a ofrecer productos de la más alta calidad, fabricados con materiales seguros para el cuerpo.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-comments-smiley"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Discreción Garantizada</h5>
                        <p>Entendemos la importancia de la privacidad en la compra de productos para adultos. Por eso, todos nuestros envíos son discretos.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-headphone-alt"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Atención al Cliente</h5>
                        <p>Estamos disponibles para ayudarte en cada paso de tu compra. Desde la selección del producto hasta la entrega.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE --> 

@endsection