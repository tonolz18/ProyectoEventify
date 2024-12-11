<h1>Asistentes al evento: {{ $event->title }}</h1>

@if ($attendees->isEmpty())
    <p>No hay asistentes registrados aún.</p>
@else
    <ul>
        @foreach ($attendees as $attendee)
            <li>
                {{ $attendee->user->name }} - {{ $attendee->ticket->ticket_type }} ({{ $attendee->quantity }} boletos)
            </li>
        @endforeach
    </ul>
@endif
