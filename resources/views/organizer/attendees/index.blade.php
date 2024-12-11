@extends('layouts.app')

@section('title', 'Asistentes del Evento')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-indigo-600 mb-4">Asistentes de tus eventos</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @foreach ($event->attendees->groupBy('ticket_type') as $ticketType => $attendees)
                <h2 class="text-lg font-semibold mt-6 text-indigo-500">{{ $ticketType }}</h2>
                <table class="min-w-full bg-white border border-gray-300 rounded-lg mt-4">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Cantidad</th>
                        <th class="py-2 px-4 border-b">Estado</th>
                        <th class="py-2 px-4 border-b">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($attendees as $attendee)
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b">{{ $attendee->user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $attendee->user->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $attendee->quantity }}</td>
                            <td class="py-2 px-4 border-b">
                                @if ($attendee->validated)
                                    <span class="text-green-500">Validado</span>
                                @else
                                    <span class="text-red-500">Pendiente</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">
                                @if (!$attendee->validated)
                                    <form action="{{ route('organizer.tickets.validate', $attendee->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success w-100">
                                            Validar
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach

            <div class="mt-6">
                <a href="{{ route('organizer.events.index') }}" class="inline-block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition duration-300">
                    Volver a Mis Eventos
                </a>
            </div>
        </div>
    </div>
@endsection
