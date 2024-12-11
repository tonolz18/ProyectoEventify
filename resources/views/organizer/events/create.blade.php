@extends('layouts.app')

@section('title', 'Crear Nuevo Evento')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 600px;">
            <h2 class="text-center text-primary mb-4">Crear Nuevo Evento</h2>
            <form action="{{ route('organizer.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título del Evento:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Fecha y hora:</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Ubicación:</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logotipo del Evento:</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label">Imagen de Banner:</label>
                    <input type="file" class="form-control" id="banner" name="banner">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Crear Evento</button>
                </div>
            </form>
        </div>
    </div>
@endsection
