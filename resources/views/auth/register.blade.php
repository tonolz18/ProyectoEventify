@extends('layouts.auth')

@section('content')
    <div class="auth-container">
        <img src="{{ asset('images/EVENTIFY.png') }}" alt="Eventify Logo" class="auth-logo">
        <h2 class="auth-title">Crear Cuenta</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
            </div>
            <p class="auth-link">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a>.
            </p>
        </form>
    </div>
@endsection
