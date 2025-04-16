@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Acerca de {{ env('APP_NAME') }}</title>
<meta name="description" content=" En Área Electric, nos comprometemos a ofrecer a nuestros clientes lo último en tecnología en iluminación LED, seguridad, redes, fibra óptica, automotriz, electricidad y computación, garantizando calidad e innovación a precios competitivos. A lo largo de los años, hemos crecido y evolucionado, pero nuestra pasión por la excelencia y nuestro compromiso con el servicio al cliente siguen siendo nuestra prioridad">
<meta name="keywords" content="tecnología en iluminación LED, seguridad electrónica, redes de comunicación, fibra óptica, productos automotrices, electricidad, computación, calidad e innovación, precios competitivos, servicio al cliente, tecnología de vanguardia, productos electrónicos, iluminación de calidad, productos automotrices LED, soluciones en electricidad, fibra óptica para redes, accesorios automotrices, equipos de computación, área de iluminación LED, innovación tecnológica en productos eléctricos">
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
    	<div class="row">
        	<div class="col-lg-5">
            	<div class="about_img scene mb-lg-0">
                    <img src="{{ asset('assets/images/areaelectrics_tienda.jpeg') }}" class="rounded" alt="{{ env('APP_NAME') }} Nosotros"/>
                </div>
            </div>
            <div class="col-lg-7 px-5">
                <div class="heading_s1">
                    <h2>Acerca de Nosotros</h2>
                </div>
                <p><strong>Misión:</strong> En Área Electric, nos comprometemos a ofrecer a nuestros clientes lo último en tecnología en iluminación LED, seguridad, redes, fibra óptica, automotriz, electricidad y computación, garantizando calidad e innovación a precios competitivos. A lo largo de los años, hemos crecido y evolucionado, pero nuestra pasión por la excelencia y nuestro compromiso con el servicio al cliente siguen siendo nuestra prioridad</p>
                <p><strong>Visión:</strong> Ser la empresa líder en soluciones tecnológicas en iluminación, seguridad, redes, fibra óptica, electricidad y computación, ofreciendo productos innovadores y accesibles que mejoren la vida de nuestros clientes. En Área Electric, aspiramos a expandir nuestra presencia en el mercado, impulsando el desarrollo sostenible a través de tecnología eficiente y un servicio excepcional, consolidándonos como un referente de calidad y confianza en la industria.</p>
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
                	<h2>¿Por Qué Elegirnos?</h2>
                </div>
                <p class="text-center leads">
                    En Área Electric, no solo vendemos productos, brindamos soluciones que conectan tecnología y confianza. Somos una tienda minorista comprometida con ofrecerte lo mejor en iluminación LED, redes, fibra óptica, electricidad, seguridad y más, con el respaldo de marcas reconocidas y un servicio al cliente cercano y eficiente.                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon_box icon_box_style4 box_shadow1">
                    <div class="icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="icon_box_content">
                        <h5>Delivery Gratis en Caracas</h5>
                        <p>Recibe tus pedidos donde te encuentres. Ofrecemos envíos puerta a puerta en todo el territorio nacional, asegurando que tus productos lleguende forma rápida y segura. Delivery Gratis en la Ciudad de Caracas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="icon_box icon_box_style4 box_shadow1">
                    <div class="icon">
                        <i class="far fa-handshake"></i>
                    </div>
                    <div class="icon_box_content">
                        <h5>Envio Gratis por Mercado Libre</h5>
                        <p>Aprovecha nuestro beneficio de <strong>envío totalmente gratis</strong> en tus compras realizadas a través de Mercado Libre. Recibe tus productos directamente en la puerta de tu casa, sin costos adicionales y con confianza.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="icon_box icon_box_style4 box_shadow1">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>                    
                    </div>
                    <div class="icon_box_content">
                        <h5>Envíos a nivel Nacional</h5>
                        <p>Realizamos envíos a cualquier rincón del país. No importa dónde te encuentres, nos aseguramos de que tus productos lleguen de forma segura y puntual a tu destino. Trabajamos con las principales empresas de encomienda del país.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE --> 

@endsection