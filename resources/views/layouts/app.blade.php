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
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
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

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>


    @if(request()->is('/'))
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @endif


<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar shadow-sm">
    <div class="top-header bg-dark light_skin">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 d-none d-md-block">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-email"></i><span>info@airansexshop.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="text-center text-md-right">
                       	<ul class="header_list">
                            <li><a href="{{ url('wishlist') }}"><i class="ti-heart"></i><span>Lista de Favoritos</span></a></li>
                            @auth
                            <li class="d-none d-md-inline-block">
                                <form action="{{ route('logout') }}" id="logout-form" method="post">
                                    @csrf
                                    <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span>
                                    </a>
                                </form>
                            </li>
                            @else
                            <li><a href="{{ route('login') }}"><i class="ti-user"></i><span>Inicia Sesión</span></a></li>
                            @endauth
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
                    <img class="logo_light" src="{{ asset('assets/images/logo_light.png') }}" alt="AiranzaSexShop logo" />
                    <img class="logo_dark" src="{{ asset('assets/images/logo_dark.png') }}" alt="AiranzaSexShop logo" width="160"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item active" href="{{ url('/') }}">Inicio</a></li> 
                        <li><a class="nav-link nav_item" href="{{ url('/tienda-en-linea') }}">Tienda</a></li> 
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link {{ request()->is('nuestras-categorias/*') ? 'active' : '' }}" href="#" data-toggle="dropdown">Nuestros Productos</a>
                            <div class="dropdown-menu" style="margin-top: -20px;">
                                <ul class="mega-menu d-lg-flex">
                                    @for($i = 0; $i < count($globalSections); $i++)
                                    <li class="mega-menu-col col-lg-3">
                                        <ul> 
                                            @foreach ($globalCategories->skip($globalSections[$i])->take(5) as $category)
                                            <li>
                                                <a class="nav-link nav_item" href="{{ url('nuestras-categorias/' . $category->slug) }}">{{$category->name}}</a>
                                            </li>    
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </li>                        
                        <li><a class="nav-link nav_item" href="{{ url('nosotros') }}">Nosotros</a></li> 
                        <li><a class="nav-link nav_item" href="{{ url('contacto') }}">Contacto</a></li> 
                        @auth
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">{{ Auth::user()->name }}</a>
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
                        @else
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="{{ route('login') }}">Mi Cuenta</a>
                            <div class="dropdown-menu">
                                <ul> 
                                    <li><a class="dropdown-item nav-link nav_item" href="{{ route('login') }}">Inicia Sesión</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{ route('register') }}">Regístrate</a></li>
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
                                    <span class="cart_quantity"> {{ $cartItem->qty }} x <span class="cart_amount"> <span class="price_symbole">$</span></span>{{ $cartItem->price }}</span>
                                </li>
                                @empty
                                <li>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center mb-3">
                                            <img src="{{ asset('assets/images/empty_cart.png') }}" alt="Carrito Vacío" style="max-width: 80px; width: 40%;">
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="text-center">Tu carrito está vacío. Aún no has agregado ningún producto</h6>
                                        </div>
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span>{{ Cart::subtotal() }}</span></p>
                                <p class="cart_buttons">
                                    <a href="{{ url('carrito-de-compras') }}" class="btn btn-fill-line btn-radius btn-block view-cart"><i class="icon-basket-loaded"></i> Ver Carrito</a>
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


<footer class="footer_dark">
	<div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/logo_light.png') }}" alt="Airanza Sex Shop Logo" width="200">
                            </a>
                        </div>
                        <p>Somos una tienda para adultos que ofrece una amplia selección de juguetes sexuales para hombres y mujeres, todo lo que necesita para una experiencia sensual.</p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i style="font-size: 25px;" class="ion-social-facebook"></i></a></li>
                            <li><a href="https://wa.me/584120206548?text=Hola!" target="_blank"><i style="font-size: 25px;" class="ion-social-whatsapp"></i></a></li>
                            <li><a href="https://www.instagram.com/airanzasexshop/" target="_blank"><i style="font-size: 25px;" class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Enlaces</h6>
                        <ul class="widget_links">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Nosotros</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Categorias</h6>
                        <ul class="widget_links">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Woman</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Best Saller</a></li>
                            <li><a href="#">New Arrivals</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Contáctanos</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>Caracas, Venezuela</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@airanzasexshop.com">info@airanzasexshop.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+58 412 020 6548</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-md-0 text-center text-md-left">© {{ date('Y') }} All Rights Reserved by Airanza Sex Shop | Desarrollado con ❤️ por <a href="https://www.linkedin.com/in/hectordamas/" target="_blank">Héctor Damas</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

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