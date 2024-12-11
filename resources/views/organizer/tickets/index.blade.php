@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Gestión de Boletos para {{ $event->title }}</h1>
        <a href="{{ route('organizer.tickets.create', $event->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Agregar Nuevo Boleto
        </a>

        <table class="min-w-full mt-6 table-auto bg-white shadow-lg rounded-lg">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6">Tipo</th>
                <th class="py-3 px-6">Precio</th>
                <th class="py-3 px-6">Cantidad</th>
                <th class="py-3 px-6">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr class="border-b">
                    <td class="py-3 px-6">{{ $ticket->ticket_type }}</td>
                    <td class="py-3 px-6">${{ $ticket->price }}</td>
                    <td class="py-3 px-6">{{ $ticket->quantity }}</td>
                    <td class="py-3 px-6 flex space-x-4">
                        <a href="{{ route('organizer.tickets.edit', [$event->id, $ticket->id]) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('organizer.tickets.destroy', [$event->id, $ticket->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
