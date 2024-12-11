@extends('layouts.app')

@section('content')
    <h1>Editar boleto para {{ $event->title }}</h1>
    <form action="{{ route('organizer.tickets.update', [$event->id, $ticket->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="ticket_type">Tipo de boleto:</label>
        <input type="text" name="ticket_type" value="{{ $ticket->ticket_type }}" required>

        <label for="price">Precio:</label>
        <input type="number" name="price" value="{{ $ticket->price }}" required>

        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" value="{{ $ticket->quantity }}" required>

        <button type="submit">Actualizar Boleto</button>
    </form>
@endsection
