<h1>Comprar Boletos</h1>
<form action="{{ route('events.tickets.buy', $event->id) }}" method="POST">
    @csrf
    <label for="ticket_type">Tipo de Boleto:</label>
    <select name="ticket_type">
        @foreach ($tickets as $ticket)
            <option value="{{ $ticket->id }}">{{ $ticket->ticket_type }} - ${{ $ticket->price }}</option>
        @endforeach
    </select>
    <label for="quantity">Cantidad:</label>
    <input type="number" name="quantity" min="1" max="10">
    <button type="submit">Comprar</button>
</form>
