@extends('layouts.app')

@section('content')
    <h1>Editar Evento</h1>
    <form action="{{ route('organizer.events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Título del Evento:</label>
        <input type="text" name="title" id="title" value="{{ $event->title }}" required>

        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required>{{ $event->description }}</textarea>

        <label for="date">Fecha:</label>
        <input type="datetime-local" name="date" id="date" value="{{ $event->date }}" required>

        <label for="location">Ubicación:</label>
        <input type="text" name="location" id="location" value="{{ $event->location }}" required>

        <button type="submit">Guardar Cambios</button>
    </form>
@endsection
