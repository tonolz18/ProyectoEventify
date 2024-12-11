@extends('layouts.app')

@section('content')
    <h1>Compra de boletos para {{ $event->title }}</h1>

    <form action="{{ route('user.tickets.store', $event->id) }}" method="POST">
        @csrf
        <label for="ticket_id">Selecciona el tipo de boleto:</label>
        <select name="ticket_id" required>
            @foreach ($tickets as $ticket)
                <option value="{{ $ticket->id }}">{{ $ticket->ticket_type }} - ${{ $ticket->price }}</option>
            @endforeach
        </select>

        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" min="1" max="10" required>

        <button type="submit">Comprar</button>
    </form>
@endsection
