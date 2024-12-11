@extends('layouts.app')

@section('title', 'Panel de Usuario')

@section('content')
    <div class="text-center">
        <h1 class="fw-bold">Bienvenido, {{ Auth::user()->name }}</h1>
        <p class="text-muted">Explora nuestros eventos y gestiona tus boletos.</p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('user.events.index') }}" class="btn btn-primary">Explorar Eventos</a>
            <a href="{{ route('user.tickets') }}" class="btn btn-secondary">Mis Boletos</a>
        </div>
    </div>
@endsection
