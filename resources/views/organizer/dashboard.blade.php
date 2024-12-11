@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <!-- Título de Bienvenida -->
        <h1 class="text-center text-primary fw-bold">¡Hola, {{ $organizerName }}!</h1>
        <p class="text-center text-muted">Accede rápidamente a las funciones de organizador o consulta algunos consejos útiles.</p>

        <!-- Botones de Acceso Rápido -->
        <div class="row text-center mt-5">
            <!-- Crear Nuevo Evento -->
            <div class="col-md-4 mb-3">
                <a href="{{ route('organizer.events.create') }}" class="btn btn-lg btn-success w-100">
                    <i class="fas fa-plus-circle"></i> Crear Nuevo Evento
                </a>
            </div>

            <!-- Ver Mis Eventos -->
            <div class="col-md-4 mb-3">
                <a href="{{ route('organizer.events.index') }}" class="btn btn-lg btn-primary w-100">
                    <i class="fas fa-calendar-alt"></i> Mis Eventos
                </a>
            </div>

            <!-- Ver Asistentes -->
            <div class="col-md-4 mb-3">
                <a href="{{ route('organizer.events.attendees', ['event' => 1]) }}" class="btn btn-lg btn-info w-100">
                    <i class="fas fa-users"></i> Ver Asistentes
                </a>
            </div>
        </div>

        <!-- Consejos Útiles -->
        <div class="mt-5">
            <h3 class="text-secondary fw-bold">Consejos para tus eventos <i class="fas fa-lightbulb text-warning"></i></h3>
            <ul class="list-group">
                <li class="list-group-item">Promociona tus eventos con suficiente tiempo de anticipación.</li>
                <li class="list-group-item">Responde rápidamente a las consultas de tus asistentes.</li>
                <li class="list-group-item">Monitorea el número de boletos vendidos diariamente.</li>
                <li class="list-group-item">Utiliza imágenes de alta calidad para atraer más interés.</li>
                <li class="list-group-item">Solicita retroalimentación después de cada evento para mejorar.</li>
            </ul>
        </div>
    </div>
@endsection
