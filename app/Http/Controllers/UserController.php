<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\EventAttendee;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $purchasedTickets = $user->tickets()->with('event')->get();

        return view('user.dashboard', compact('purchasedTickets'));
    }


    public function showTickets(Event $event)
    {
        $tickets = $event->tickets;
        return view('events.tickets', compact('event', 'tickets'));
    }

    public function buyTickets(Request $request, Event $event)
    {
        $validated = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $ticket = Ticket::findOrFail($validated['ticket_id']);

        $event->attendees()->create([
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,
            'event_id' => $event->id,
            'quantity' => $validated['quantity'],
        ]);

        return redirect()->back()->with('success', '¡Boletos comprados con éxito!');
    }

    public function myTickets()
    {
        $tickets = auth()->user()->tickets()->with('event')->get();
        return view('user.tickets.index', compact('tickets'));
    }
}
