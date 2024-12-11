<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Notifications\TicketPurchaseNotification;
use Illuminate\Http\Request;
use App\Models\EventAttendee;

class TicketController extends Controller
{
    public function index($eventId)
    {
        $event = Event::findOrFail($eventId);
        $tickets = $event->tickets;

        return view('organizer.tickets.index', compact('event', 'tickets'));
    }

    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);

        return view('organizer.tickets.create', compact('event'));
    }

    public function store(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $validated = $request->validate([
            'ticket_type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        $ticket = $event->tickets()->create($validated);

        // Enviar notificación al comprador
        $user = auth()->user();
        $quantity = $validated['quantity'];

        $user->notify(new TicketPurchaseNotification($event, $ticket, $quantity));

        return redirect()->route('organizer.tickets.index', $event->id)
            ->with('success', 'Boleto creado con éxito.');
    }

    public function edit($eventId, $ticketId)
    {
        $event = Event::findOrFail($eventId);
        $ticket = Ticket::where('event_id', $eventId)->findOrFail($ticketId);

        return view('organizer.tickets.edit', compact('ticket', 'event'));
    }

    public function update(Request $request, $eventId, $ticketId)
    {
        $ticket = Ticket::where('event_id', $eventId)->findOrFail($ticketId);

        $validated = $request->validate([
            'ticket_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $ticket->update($validated);

        return redirect()->route('organizer.tickets.index', $eventId)
            ->with('success', 'Boleto actualizado correctamente.');
    }

    public function destroy($eventId, $ticketId)
    {
        $ticket = Ticket::where('event_id', $eventId)->findOrFail($ticketId);
        $ticket->delete();

        return redirect()->route('organizer.tickets.index', $eventId)
            ->with('success', 'Boleto eliminado correctamente.');

    }

    public function validateTicket($id)
    {
        $eventAttendee = EventAttendee::findOrFail($id);

        $eventAttendee->update(['validated' => true]);

        return back()->with('success', 'Boleto validado exitosamente.');
    }
}
