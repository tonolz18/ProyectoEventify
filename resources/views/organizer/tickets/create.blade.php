@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Agregar Nuevo Boleto para {{ $event->title }}</h1>
        <form action="{{ route('organizer.tickets.store', $event->id) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="ticket_type" class="block text-gray-700 font-bold">Tipo de Boleto</label>
                <input type="text" id="ticket_type" name="ticket_type" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>
            <div>
                <label for="price" class="block text-gray-700 font-bold">Precio</label>
                <input type="number" id="price" name="price" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>
            <div>
                <label for="quantity" class="block text-gray-700 font-bold">Cantidad</label>
                <input type="number" id="quantity" name="quantity" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar Boleto
            </button>
        </form>
    </div
@endsection
