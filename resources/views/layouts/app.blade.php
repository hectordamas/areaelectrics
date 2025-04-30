<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Héctor Damas" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

@yield('metadata')

<link rel="canonical" href="{{ url()->current() }}">
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png?v=1') }}">
<!-- Animation CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">	
<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- Icon Font CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/linearicons.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css')}}">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.theme.default.min.css') }}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
<!-- Slick CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
<!-- Style CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css?v=1') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>


    @if(request()->is('/'))
    <div class="preloader">
        <div 
            class="d-flex justify-content-center align-items-center" 
            style="width: 100%; height:100%; background-color: rgba(255, 255, 255, 0.3);">
            <span class="loader"></span>
        </div>
    </div>
    @endif


<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar shadow-sm">
    <div class="top-header light_skin bg_dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown mr-2">
                            <select name="countries" class="custome_select">
                                <option value='es' data-image="{{ asset('assets/images/ven.png') }}" data-title="Venezuela">Venezuela</option>
                            </select>
                        </div>
                        <ul class="contact_detail text-center text-lg-left">
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=584129096156&text=Hola, le escribo desde la página web estoy interesado en conocer más sobre sus productos"
                                    target="_blank">
                                    <i class="fab fa-whatsapp"></i><span>+58 412 909 6156</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                           <ul class="header_list">
                            @guest
                                <li class="d-none d-md-inline-block"><a href="{{ url('login') }}"><i class="fas fa-user"></i> <span>Inicia Sesión</span></a></li>
                                <li class="d-none d-md-inline-block"><a href="{{ url('register') }}"><i class="fas fa-user-plus"></i> <span>Registrate</span></a></li>
                            @else
                                @if(Auth::user()->role == 'Administrador')
                                    <li class="d-none d-md-inline-block">
                                        <a href="{{ url('home') }}"><i class="fas fa-users-cog"></i> <span>Administrador</span></a>
                                    </li>
                                @endif
                                <li class="d-none d-md-inline-block">
                                    <form action="{{ route('logout') }}" id="logout-form" method="post">
                                        @csrf
                                        <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> <span>Cerrar Sesión</span>
                                        </a>
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg py-3"> 
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo_light" src="{{ asset('assets/images/logo_light.png') }}" alt="{{ env('APP_NAME') }} Logo Light" style="max-width: 160px;" />
                    <img class="logo_dark" src="{{ asset('assets/images/logo_dark.png') }}" alt="{{ env('APP_NAME') }} Logo Dark" style="max-width: 160px;"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a></li> 
                        <li><a class="nav-link nav_item {{ request()->is('tienda-en-linea') ? 'active' : '' }}" href="{{ url('/tienda-en-linea') }}">Tienda</a></li> 
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link {{ request()->is('nuestras-categorias/*') ? 'active' : '' }}" href="#" data-toggle="dropdown">
                                Nuestros Productos
                            </a>
                            <div class="dropdown-menu" style="margin-top: -30px;">
                                <ul class="mega-menu d-lg-flex">
                                    @for($i = 0; $i < count($globalSections); $i++)
                                    <li class="mega-menu-col col-lg-3">
                                        <ul> 
                                            @foreach ($globalCategories->skip($globalSections[$i])->take(5) as $category)
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-header nav-link nav_item  @if ($category->subcategories->count()) dropdown-toggler @endif" 
                                                       href="{{ url('nuestras-categorias/' . $category->slug) }}"
                                                       @if ($category->subcategories->count()) 
                                                        onclick="window.open('{{ url('nuestras-categorias/' . $category->slug) }}', '_self')"
                                                       @endif
                                                       >
                                                        {{ $category->name }}
                                                    </a>
                        
                                                    @if ($category->subcategories->count())
                                                        <ul class="dropdown-menu">
                                                            @foreach ($category->subcategories as $sub)
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ url('nuestras-categorias/' . $sub->slug) }}">
                                                                        {{ $sub->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </li>
                        
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link {{ request()->is('nuestras-marcas/*') ? 'active' : '' }}" href="#" data-toggle="dropdown">Marcas</a>
                            <div class="dropdown-menu" style="margin-top: -30px;">
                                <ul class="mega-menu d-lg-flex">
                                    @for($i = 0; $i < count($globalSections); $i++)
                                    <li class="mega-menu-col col-lg-3">
                                        <ul> 
                                            @foreach ($globalBrands->skip($globalSections[$i])->take(5) as $brand)
                                            <li>
                                                <a class="dropdown-header nav-link nav_item" href="{{ url('nuestras-marcas/' . $brand->slug) }}">{{$brand->name}}</a>
                                            </li>    
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </li>                     
                        <li><a class="nav-link nav_item {{ request()->is('nosotros') ? 'active' : '' }}" href="{{ url('nosotros') }}">Nosotros</a></li> 
                        <li><a class="nav-link nav_item {{ request()->is('contacto') ? 'active' : '' }}" href="{{ url('contacto') }}">Contacto</a></li> 
                        <li><a class="nav-link nav_item d-list-item d-md-none" href="{{ url('login') }}">Inicia Sesión</a></li> 
                        <li><a class="nav-link nav_item d-list-item d-md-none" href="{{ url('register') }}">Registrate</a></li> 
                        
                        @auth
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                <ul> 
                                    <li><a class="dropdown-item nav-link nav_item" href="{{ url('mis-ordenes') }}">Mis Órdenes</a></li> 
                                    @if(Auth::user()->role == 'Administrador')
                                    <li><a class="dropdown-item nav-link nav_item" href="{{ url('home') }}">Administrador</a></li> 
                                    @endif
                                    <li>
                                        <form action="{{ route('logout') }}" id="logout" method="post">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item nav-link nav_item" href="javascript:void(0);" onclick="document.getElementById('logout').submit();">
                                            Cerrar Sesión
                                        </a>
                                    </li> 
                                </ul>
                            </div>
                        </li>                                
                        @endauth
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form action="{{ url('buscar') }}">
                                <input type="text" placeholder="Buscar Productos" class="form-control" id="search_input" name="search">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div><div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">{{ Cart::count() }}</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                @forelse(Cart::content()->reverse()->take(2)->reverse() as $cartItem)
                                <li>
                                    <a href="#">
                                        <img src="{{ isset($cartItem->options['image']) ? $cartItem->options['image'] : null }}" alt="Carrito de compras {{ $cartItem->name }}"> {{ $cartItem->name }}
                                    </a>
                                    <span class="cart_quantity">
                                        {{ $cartItem->qty }} x 
                                        <span class="cart_amount">
                                            <small>(Detal: ${{ $cartItem->price_detal }})</small> <br>
                                            <small>(Mayor: ${{ $cartItem->price ?? 'N/A' }})</small>
                                        </span>
                                    </span>
                                </li>
                                @empty
                                <li>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center mb-3">
                                            <img src="{{ asset('assets/images/empty_cart.png') }}" alt="Carrito Vacío" style="max-width: 200px; width: 50%;">
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="text-center">Tu carrito está vacío. Aún no has agregado ningún producto</h6>
                                        </div>
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                            <div class="cart_footer">
                                <!-- Subtotal Mayor: Basado en el precio mayor por defecto -->
                                <p class="cart_total"><strong>Subtotal Mayor:</strong> 
                                    <span class="cart_price" id="cart_subtotal_mayor">
                                        <span class="price_symbole">$</span>{{ Cart::subtotal() }}
                                    </span>
                                </p>
                            
                                <!-- Subtotal Detal: Basado en el precio detallado de cada producto -->
                                @php
                                    $subtotalDetal = Cart::content()->reduce(function($carry, $item) {
                                        return $carry + ($item->qty * ($item->options['price_detal'] ?? $item->price)); // Usa el precio de detal si existe
                                    }, 0);
                                @endphp
                                <p class="cart_total"><strong>Subtotal Detal:</strong> 
                                    <span class="cart_price" id="cart_subtotal_detal">
                                        <span class="price_symbole">$</span>{{ number_format($subtotalDetal, 2) }}
                                    </span>
                                </p>
                            
                                <p class="cart_buttons">
                                    <a href="{{ url('carrito-de-compras') }}" class="btn btn-fill-line btn-radius btn-block view-cart">
                                        <i class="icon-basket-loaded"></i> Ver Carrito
                                    </a>
                                </p>
                            </div>
                            
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->



@yield('content')


<!-- START FOOTER -->
<footer class="footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer_logo">
                        <a href="#">
                            <img src="{{ asset('assets/images/logo_light.png') }}" style="max-width: 240px;" alt="logo">
                        </a>
                    </div>
                    <div class="widget">
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@areaelectrics.com.ve">info@areaelectrics.com.ve</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+58 412 909 6156</p>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <ul class="social_icons contact_info_light">
                            <li><a href="https://www.instagram.com/areaelectric/" target="_blank"><i class="fab fa-instagram" style="font-size: 30px;"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=584129096156&text=Hola, le escribo desde la página web estoy interesado en conocer más sobre sus productos" target="_blank"><i class="fab fa-whatsapp" style="font-size: 30px;"></i></a></li>
                            <li><a href="https://www.tiktok.com/@areaelectric2021" target="_blank"><i class="fab fa-tiktok"  style="font-size: 30px;"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Enlaces</h6>
                        <ul class="widget_links">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li><a href="{{ url('tienda-en-linea') }}">Tienda</a></li>
                            <li><a href="{{ url('nosotros') }}">Acerca De</a></li>
                            <li><a href="{{ url('contacto') }}">Contacto</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Categorías</h6>
                        <ul class="widget_links">
                            @foreach($globalCategories->take(6) as $category)
                                <li><a href="{{ url('nuestras-categorias/' . $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Nuestras Marcas</h6>
                        <ul class="widget_links">
                            @foreach($globalBrands->take(6) as $brand)
                                <li><a href="{{ url('nuestras-marcas/' . $brand->slug) }}">{{ $brand->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="mb-5"></div>
                        <ul class="widget_links">
                            @foreach($globalBrands->skip(6)->take(7) as $brand)
                                <li><a href="{{ url('nuestras-marcas/' . $brand->slug) }}">{{ $brand->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- Iconos Flotantes -->
<div class="floating-icons">
    <!-- Icono de WhatsApp -->
    <a href="https://wa.me/584129096156?text=Hola, le escribo desde la página web estoy interesado en conocer más sobre sus productos" target="_blank" class="whatsapp" title="WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    <!-- Icono de Instagram -->
    <a href="https://www.instagram.com/areaelectric" target="_blank" class="instagram" title="Instagram">
        <i class="fab fa-instagram"></i>
    </a>
    <!-- Icono de Ubicación -->
    <a href="https://maps.app.goo.gl/EmQxFoVn3LphNfDq9" target="_blank" class="location" title="Ubicación">
        <i class="fas fa-map-marker-alt"></i>
    </a>
</div>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script> 
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/owlcarousel/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script> 
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script> 
<script src="{{ asset('assets/js/parallax.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script> 
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dd.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>

<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

@if(session()->has('error'))
<script>
    var colorError = '#dc3545';
    Swal.fire({
        icon:'error', 
        title:'Ha ocurrido un error!', 
        text: "{{ session('error') }}", 
        confirmButtonText: "OK", 
        confirmButtonColor: colorError
    })
</script>
@endif

@if(session()->has('message'))
<script>
    var colorSuccess = '#28a745';
    Swal.fire({
        icon:'success', 
        title:'', 
        text: "{{ session('message') }}", 
        confirmButtonText: 'OK', 
        confirmButtonColor: colorSuccess
    })
</script>
@endif

</body>
</html>