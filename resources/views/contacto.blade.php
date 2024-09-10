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
                        <a href="https://www.instagram.com/airanzasexshop/" target="_blank">@airanzasexshop</a>
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
                        <a href="mailto:info@airanzasexshop.com">info@airanzasexshop.com</a>
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
                            href="https://api.whatsapp.com/send?phone=584120206548&text=Hola, estoy interesado en conocer más sobre sus productos" 
                            target="_blank">+58 412 020 6548</a>
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

            <div class="d-none d-lg-block col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0 pb-md-0 pb-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.136273377976!2d-66.87104550812094!3d10.489922006542878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a590045bc2a7b%3A0x1a8393d7e24e1c91!2sAngel%20de%20la%20Suerte!5e0!3m2!1ses-419!2sve!4v1725644162922!5m2!1ses-419!2sve" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            
            </div>
            <div class="col-lg-6 pl-md-4">
            	<div class="heading_s1">
                	<h2>Contáctanos</h2>
                </div>
                <p class="leads">Si tienes alguna duda sobre nuestros productos, no dudes en contactarnos. Estamos disponibles 24/7 para brindarte la mejor asesoría</p>
                <div class="field_form">
                    <form method="post" action="{{ route('messages.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input required placeholder="Nombre *" id="first-name" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="E-Mail *" id="email" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Número de Teléfono *" id="phone" class="form-control" name="telephone">
                            </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="Asunto" id="subject" class="form-control" name="subject">
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