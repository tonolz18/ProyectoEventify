<h1>Comprar boletos para {{ $event->title }}</h1>

@foreach($tickets as $ticket)
    <div>
        <p>Tipo: {{ $ticket->type }}</p>
        <p>Precio: ${{ $ticket->price }}</p>
        <p>Cantidad disponible: {{ $ticket->quantity }}</p>
        <form action="{{ route('events.tickets.buy', $event->id) }}" method="POST">
            @csrf
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
            <label for="quantity">Cantidad:</label>
            <input type="number" name="quantity" min="1" max="{{ $ticket->quantity }}" required>
            <button type="submit">Comprar</button>
        </form>
    </div>
@endforeach
