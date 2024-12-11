@extends('emails.layouts.base')

@section('title', 'Resumen de tu compra para ' . $event->title)
@section('header')
    {{ $notifiable->name }}, los detalles de tu compra.
@endsection

@section('content')
    <ul>
        <li><strong>Evento:</strong> {{ $event->title }}</li>
        <li><strong>Ubicación:</strong> {{ $event->location }}</li>
        <li><strong>Fecha:</strong> {{ $event->date->format('d/m/Y H:i') }}</li>
        <li><strong>Boletos adquiridos:</strong> {{ $quantity }}</li>
        <li><strong>Precio total:</strong> ${{ number_format($quantity * $ticket->price, 2) }}</li>
    </ul>
    <p><a href="{{ url('/user/events/' . $event->id) }}" class="button">Ver evento</a></p>
    <p>¡Esperamos que disfrutes del evento!</p>
@endsection
