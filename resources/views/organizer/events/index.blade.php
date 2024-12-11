@extends('layouts.app')

@section('title', 'Mis Eventos')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="display-6 fw-bold text-primary">Mis Eventos</h1>
            <a href="{{ route('organizer.events.create') }}" class="btn btn-success mt-3">
                Crear Nuevo Evento
            </a>
        </div>

        <div class="row g-4">
            @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                            <p class="card-text">
                                {{ $event->location }} <br>
                                <strong>Fecha:</strong> {{ $event->date->format('d/m/Y H:i') }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('organizer.events.show', $event->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                                <a href="{{ route('organizer.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('organizer.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
