@extends('layouts.app')

@section('title', 'Lista de Asistentes')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-indigo-600 mb-4">Eventos con Asistentes</h1>
            <table class="min-w-full bg-white border border-gray-300 rounded-lg mt-4">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Título del Evento</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                    <tr class="text-center">
                        <td class="py-2 px-4 border-b">{{ $event->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $event->date->format('d/m/Y H:i') }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('organizer.events.attendees', $event->id) }}" class="btn btn-primary">
                                Ver Asistentes
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
