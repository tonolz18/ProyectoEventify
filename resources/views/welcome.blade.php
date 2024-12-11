@extends('layouts.app')

@section('title', 'Bienvenido a Eventify')

@section('content')
    <div class="text-center py-5">
        <h1 class="display-4 mb-4">¡Bienvenido a Eventify!</h1>
        <p class="lead mb-4">La plataforma ideal para organizar y asistir a eventos.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Registrarse</a>
    </div>
@endsection
