@extends('layouts.app')

@section('metadata')
<title>{{ env('APP_NAME') }} - Contacto</title>
<meta name="description" content="Contáctanos en Airanza Sex Shop para recibir asesoría sobre nuestros productos íntimos. Estamos disponibles 24/7 para ofrecerte la mejor atención. Síguenos en Instagram, escríbenos por correo o contáctanos por WhatsApp.">
<meta name="keywords" content="contacto, asesoría, tienda para adultos, juguetes sexuales, productos íntimos, whatsapp, instagram, discreción, Airanza Sex Shop">
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
                        <a href="https://www.instagram.com/areaelectric/" target="_blank">@areaelectric</a>
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
                        <a href="mailto:info@areaelectric.com.ve">info@areaelectric.com.ve</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div class="contact_text">
                        <span>WhatsApp</span>
                        <a 
                            href="https://api.whatsapp.com/send?phone=584129096156&text=Hola, le escribo desde la página web estoy interesado en conocer más sobre sus productos" 
                            target="_blank">+58 412 909 6156</a>
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
            <div class="d-none d-lg-block col-lg-6 pt-0 mt-0 pb-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490.3833476330148!2d-66.87500785036356!3d10.49540191690729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a59aae9b4d625%3A0x4ec5604d97b62126!2sInversiones%20Area%20Electric%202021!5e0!3m2!1ses-419!2sve!4v1744711223386!5m2!1ses-419!2sve" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                <button type="submit" class="btn btn-fill-out">
                                    <i class="fas fa-paper-plane"></i> Enviar Mensaje
                                </button>
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