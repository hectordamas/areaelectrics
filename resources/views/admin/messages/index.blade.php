@extends('layouts.admin')

@section('title')
    <title>{{ env('APP_NAME') }} - Bandeja de Entrada</title>
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h5 mb-3 text-gray-800">Bandeja de Entrada</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Mensajes Recibidos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0 inbox-table">
                    <tbody>
                        @forelse($messages as $message)
                            <tr class="inbox-item {{ $message->is_read ? '' : 'font-weight-bold table-hover table-secondary' }}">
                                <td class="align-middle text-nowrap" style="width: 5%;">
                                    @if(!$message->is_read)
                                        <span class="badge badge-primary">No Leido</span>
                                    @endif
                                </td>
                                <td class="align-middle text-truncate" style="max-width: 150px;">
                                    {{ $message->name }}
                                </td>
                                <td class="align-middle text-truncate" style="max-width: 400px;">
                                    {{ Str::limit($message->subject, 50) }}
                                </td>
                                <td class="align-middle text-nowrap" style="width: 15%;">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                                <td class="align-middle text-right" style="width: 10%;">
                                    <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-outline-primary">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay mensajes</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginación -->
        <div class="card-footer py-3">
            <nav aria-label="Page navigation example">
                {{ $messages->appends(request()->input())->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection
