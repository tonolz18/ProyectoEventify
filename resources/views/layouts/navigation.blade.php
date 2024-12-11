<nav>
    <div>
        <a href="{{ route('dashboard') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    @if(auth()->user()->hasRole('user'))
        <a href="{{ route('user.tickets') }}">Mis Boletos</a>
    @endif

    <div>
        <!-- Enlace para cerrar sesión -->
        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800">
                    Logout
                </button>
            </form>
        @endauth
    </div>
</nav>
