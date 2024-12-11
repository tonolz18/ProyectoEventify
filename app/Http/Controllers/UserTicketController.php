<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TicketPurchaseNotification;

class UserTicketController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'ticket_type' => 'required|string',
        ]);

        $ticket = new Ticket();
        $ticket->user_id = auth()->id();
        $ticket->event_id = $event->id;
        $ticket->quantity = $validated['quantity'];
        $ticket->ticket_type = $validated['ticket_type'];
        $ticket->save();

        try {
            $user = auth()->user();
            $user->notify(new TicketPurchaseNotification($event, $ticket, $validated['quantity']));
        } catch (\Exception $e) {
            \Log::error("Error enviando correo: " . $e->getMessage());
            return redirect()->route('user.events.show', $event->id)
                ->with('error', 'Boleto comprado, pero no se pudo enviar el correo.');
        }

        return redirect()->route('user.events.show', $event->id)
            ->with('success', 'Boleto comprado exitosamente.');
    }
}
