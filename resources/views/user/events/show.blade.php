@extends('layouts.app')

@section('title', 'Detalles del Evento')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 800px;">
            <h2 class="text-center text-primary mb-4">{{ $event->title }}</h2>

            @if ($event->banner_image)
                <img src="{{ asset('storage/banners/' . $event->banner_image) }}" alt="Banner del evento" class="w-100 mb-4 rounded">
            @endif

            <p><strong>Descripción:</strong> {{ $event->description }}</p>
            <p><strong>Fecha:</strong> {{ $event->date }}</p>
            <p><strong>Ubicación:</strong> {{ $event->location }}</p>

            <hr class="my-4">

            <h3 class="text-center text-success mb-3">Compra Boletos</h3>
            <form action="{{ route('events.tickets.buy', $event->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="ticket_id" class="form-label">Seleccionar Boleto:</label>
                    <select name="ticket_id" id="ticket_id" class="form-select" required>
                        @foreach ($event->tickets as $ticket)
                            <option value="{{ $ticket->id }}">
                                {{ $ticket->ticket_type }} - ${{ $ticket->price }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad:</label>
                    <input type="number" name="quantity" id="quantity" min="1" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Comprar Boletos</button>
                </div>
            </form>

            <hr class="my-4">

            <h3 class="text-center text-info mb-3">Deja un Comentario</h3>
            <form action="{{ route('user.events.comments.store', $event->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="comment" placeholder="Escribe tu comentario" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Puntaje:</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="1">1 - Malo</option>
                        <option value="2">2 - Regular</option>
                        <option value="3">3 - Bueno</option>
                        <option value="4">4 - Muy Bueno</option>
                        <option value="5">5 - Excelente</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar Comentario</button>
                </div>
            </form>

            <hr class="my-4">

            <h3 class="text-center text-warning mb-3">Comentarios</h3>
            <ul class="list-group">
                @forelse ($event->comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->user->name }}</strong> (Puntaje: {{ $comment->rating }})<br>
                        {{ $comment->comment }}
                    </li>
                @empty
                    <li class="list-group-item text-center">No hay comentarios aún.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
