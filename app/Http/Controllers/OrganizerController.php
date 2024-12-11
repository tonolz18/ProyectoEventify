<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $events = auth()->user()->events;
        return view('organizer.dashboard', compact('events'));
    }

    public function createEvent()
    {
        return view('organizer.events.create');
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'logo' => 'nullable|image',
        ]);

        $event = new Event();
        $event->user_id = auth()->id();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location = $request->location;

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $event->logo = basename($path);
        }

        $event->save();

        return redirect()->route('organizer.events.index')->with('success', 'Evento creado exitosamente');
    }

    public function showAttendees($eventId)
    {
        $event = Event::findOrFail($eventId);
        $attendees = $event->attendees()->with('user', 'ticket')->get();

        return view('organizer.attendees.index', compact('event', 'attendees'));
    }

    public function dashboard()
    {
        $organizerName = auth()->user()->name; // Obtener el nombre del organizador autenticado

        return view('organizer.dashboard', compact('organizerName'));
    }

    public function listEvents()
    {
        $events = Event::where('organizer_id', auth()->id())->get();
        return view('organizer.events.index', compact('events'));
    }

    public function listAttendees()
    {
        $events = Event::with(['attendees.user'])
            ->where('organizer_id', auth()->id())
            ->get();

        return view('organizer.attendees.list', compact('events'));
    }

}


