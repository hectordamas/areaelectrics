@extends('layouts.app')
@section('metadata')
<title>{{ env('APP_NAME') }} - Página no encontrada</title>
@endsection
@section('content')
<div class="main_content">

    <!-- START 404 SECTION -->
    <div class="section">
        <div class="error_wrap">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10 order-lg-first">
                        <div class="text-center">
                            <div class="error_txt">404</div>
                            <h5 class="mb-2 mb-sm-3">Página no encontrada!</h5> 
                            <p>Parece que la página que buscas no existe.</p>
                            <a href="{{ url('/') }}" class="btn btn-fill-out">Ir al Inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END 404 SECTION -->
    
</div>
@endsection