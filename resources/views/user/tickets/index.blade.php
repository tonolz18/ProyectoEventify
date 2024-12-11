@extends('layouts.app')

@section('title', 'Mis Boletos')

@section('content')
    <h1 class="fw-bold mb-4 text-center">Mis Boletos</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Evento</th>
                <th>Ubicación</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Sección</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->event->title }}</td>
                    <td>{{ $ticket->event->location }}</td>
                    <td>{{ $ticket->event->date->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-2">{{ $ticket->pivot->quantity }}</td>
                    <td>{{ $ticket->section }}</td>
                    <td>
                        <a href="{{ route('user.events.show', $ticket->event->id) }}" class="btn btn-primary btn-sm">Ver Evento</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No tienes boletos adquiridos.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
