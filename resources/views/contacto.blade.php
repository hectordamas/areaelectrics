@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Contacto</title>
<meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
@endsection

@section('content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Información de Contacto</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Información de Contacto</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>

<!-- START SECTION CONTACT -->
<div class="section pb_70">
	<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="contact_text">
                        <span>Instagram</span>
                        <a href="https://www.instagram.com/fibersolutions.ve/" target="_blank">@fibersolutions.ve</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="contact_text">
                        <span>Correo Electrónico</span>
                        <a href="mailto:info@fibersolutions.com.ve">info@fibersolutions.com.ve</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="contact_text">
                        <span>Teléfono Celular</span>
                        <a 
                            href="https://api.whatsapp.com/send?phone=584127047850&text=Hola, estoy interesado en conocer más sobre sus productos" 
                            target="_blank">+58 412-7047850</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12">
            	<div class="heading_s1">
                	<h2>Contáctanos</h2>
                </div>
                <p class="leads">Si tienes alguna duda sobre nuestros productos, no dudes en contactarnos. Estamos disponibles 24/7 para brindarte la mejor asesoría</p>
                <div class="field_form">
                    <form method="post" action="{{ route('messages.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input required placeholder="Ingresa tu Nombre *" id="first-name" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Ingresa tu E-Mail *" id="email" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Ingresa tu Número de Teléfono *" id="phone" class="form-control" name="telephone">
                            </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Asunto del Mensaje" id="subject" class="form-control" name="subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea required placeholder="Mensaje *" id="description" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-fill-out">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->
@endsection