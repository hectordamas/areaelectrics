@extends('layouts.admin')

@section('title')
    <title>{{ env('APP_NAME') }} - Mensaje {{ $message->subject }}</title>
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h5 mb-3 text-gray-800">Detalles del Mensaje {{ $message->subject }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Información del Mensaje</h6>
            <div>
                @if(!$message->is_read)
                    <span class="badge badge-danger">No Leído</span>
                @else
                    <span class="badge badge-primary">Leído</span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="text-dark font-weight-bold">De:</h5>
                    <p class="mb-0">{{ $message->name }}</p>
                    <p><a href="https://mail.google.com/mail/?view=cm&to={{ $message->email }}">{{ $message->email }}</a></p>                
                </div>
                <div class="col-md-6 text-right">
                    <h5 class="text-dark font-weight-bold">Recibido:</h5>
                    <p>{{ $message->created_at->format('d M, Y - h:i A') }}</p>
                </div>
            </div>

            <div class="border-top pt-4">
                <h6 class="text-dark font-weight-bold">Mensaje:</h6>
                <p class="text-dark">{{ $message->message }}</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('messages.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left"></i> Volver a la Bandeja de Entrada
        </a>
        <a href="https://mail.google.com/mail/?view=cm&to={{ $message->email }}" target="_blank" class="btn btn-primary">
            <i class="fas fa-reply"></i> Responder
        </a>
    </div>
</div>
@endsection
