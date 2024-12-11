@extends('layouts.auth')

@section('content')
    <div class="auth-container">
        <img src="{{ asset('images/EVENTIFY.png') }}" alt="Eventify Logo" class="auth-logo">
        <h2 class="auth-title">Iniciar Sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
            <p class="auth-link">
                ¿Olvidaste tu contraseña? <a href="{{ route('password.request') }}">Recupérala aquí</a>.
            </p>
        </form>
    </div>
@endsection
