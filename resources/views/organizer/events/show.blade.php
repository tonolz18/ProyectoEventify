@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-indigo-600 mb-4">{{ $event->title }}</h1>
            <p class="text-gray-700"><span class="font-semibold">Descripción:</span> {{ $event->description }}</p>
            <p class="text-gray-700 mt-2"><span class="font-semibold">Fecha:</span> {{ $event->date->format('d/m/Y H:i') }}</p>
            <p class="text-gray-700 mt-2"><span class="font-semibold">Ubicación:</span> {{ $event->location }}</p>

            <div class="mt-6">
                <a href="{{ route('organizer.events.index') }}" class="inline-block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition duration-300">
                    Volver a la lista
                </a>
            </div>
        </div>
    </div>
@endsection
