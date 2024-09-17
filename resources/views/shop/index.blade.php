@extends('layouts.app')

@section('metadata')
    @php
        $pageTitle = 'Resultados de Búsqueda';
        $pageDescription = 'Explora nuestra amplia selección de productos en categorías y marcas destacadas. Encuentra lo que necesitas en nuestra tienda en línea de redes, iluminación, y más.';
        $pageKeywords = implode(', ', $products->pluck('name')->toArray()) . 'productos en venta, búsqueda de productos, categorías, marcas, tienda en línea, dildos, juguetes para adultos, vibradores, consoladores, succionadores, sexo, juguetes sexuales, plug';
        
        if (request()->is('nuestras-categorias/*')) {
            $pageTitle = $category->name . ' - ' . env('APP_NAME');
            $pageDescription = 'Descubre los productos en la categoría de ' . $category->name . ' en nuestra tienda de juguetes sexuales.';
            $pageKeywords = implode(', ', $products->pluck('name')->toArray()) . ', ' . 'categorías de productos, tienda en línea';
        } elseif (request()->is('nuestras-marcas/*')) {
            $pageTitle = $brand->name . ' - ' . env('APP_NAME');
            $pageDescription = 'Encuentra productos de la marca ' . $brand->name . ' en nuestra tienda. Explora nuestra gama de productos de alta calidad.';
            $pageKeywords = implode(', ', $products->pluck('name')->toArray()) . ', ' . 'marcas de productos, tienda en línea';
        } elseif (request()->has('search')) {
            $searchTerm = request()->input('search');
            $pageTitle = 'Resultados de Búsqueda para "' . $searchTerm . '" - ' . env('APP_NAME');
            $pageDescription = 'Resultados de búsqueda para "' . $searchTerm . '" en nuestra tienda mayorista. Encuentra productos relevantes para tu búsqueda.';
            $pageKeywords = $searchTerm . ', búsqueda de productos, tienda en línea';
        }
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="keywords" content="{{ $pageKeywords }}">
@endsection

@section('content')

@if(request()->is('nuestras-categorias/*') || request()->is('nuestras-marcas/*'))
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
            	<div class="col-md-6">
                    <div class="page-title">
                        @if(request()->is('nuestras-categorias/*'))
                		    <h1>{{ $category->name }}</h1>
                        @endif

                        @if(request()->is('nuestras-marcas/*'))
                            <h1>{{ $brand->name }}</h1>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{url('/') }}">Inicio</a></li>
                        @if(request()->is('nuestras-categorias/*'))
                            <li class="breadcrumb-item"><a href="#">Categorías</a></li>
                            <li class="breadcrumb-item active">{{ $category->name }}</li>
                        @endif

                        @if(request()->is('nuestras-marcas/*'))
                            <li class="breadcrumb-item"><a href="#">Marcas</a></li>
                            <li class="breadcrumb-item active">{{ $brand->name }}</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
@endif

<div class="main_content">
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-3 col-6 px-2">
                        @include('components.product')
                    </div>
                @empty
                <div class="col-md-12 d-flex justify-content-center">
                    <img src="{{ asset('assets/images/no_results_found.png') }}" class="w-100" style="max-width: 250px;" alt="Resultado no encontrados" />
                </div>
                <div class="col-md-12 mt-3">
                    <h5 class="text-center">No se han encontrado productos en esta sección</h5>
                </div>
                @endforelse
            </div>

            <div class="row">
                <div class="col-12">

                    {!! $products->links('components.pagination') !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection