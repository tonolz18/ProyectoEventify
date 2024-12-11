@extends('layouts.app')

@section('title', 'Explorar Eventos')

@section('content')
    <h1 class="mb-4 text-center">Explorar Eventos</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($events as $event)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/event-placeholder.jpg') }}" class="card-img-top" alt="Imagen del Evento">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">
                            {{ $event->description }}<br>
                            <strong>Fecha:</strong> {{ $event->date }}<br>
                            <strong>Ubicación:</strong> {{ $event->location }}
                        </p>
                        <a href="{{ route('user.events.show', $event->id) }}" class="btn btn-primary">Ver Más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
