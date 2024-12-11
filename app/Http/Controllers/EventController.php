<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\EventUpdatedNotification;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('organizer_id', auth()->id())->get();
        return view('organizer.events.index', compact('events'));
    }

    public function create()
    {
        return view('organizer.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'organizer_id' => auth()->id(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('organizer.events.index')->with('success', 'Evento creado con éxito.');
    }



    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('organizer.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('organizer.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $event->update($request->all());

        return redirect()->route('organizer.events.index')->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();

        return redirect()->route('organizer.events.index')->with('success', 'Evento eliminado correctamente.');
    }
}
