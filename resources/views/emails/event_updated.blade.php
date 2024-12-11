@extends('emails.layouts.base')

@section('title', 'Actualización del Evento')
@section('header', 'Actualización del Evento')

@section('content')
    <p>Hola {{ $notifiable->name }},</p>
    <p>El evento <strong>{{ $event->title }}</strong> ha sido actualizado. A continuación los nuevos detalles:</p>
    <ul>
        <li><strong>Fecha:</strong> {{ $event->date->format('d/m/Y H:i') }}</li>
        <li><strong>Ubicación:</strong> {{ $event->location }}</li>
    </ul>
    <p><a href="{{ url('/events/' . $event->id) }}" class="button">Ver evento</a></p>
@endsection

