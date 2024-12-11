<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('user.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $event->load('comments.user');
        return view('user.events.show', compact('event'));
    }
    public function storeComment(Request $request, Event $event)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $event->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->route('user.events.show', $event->id)->with('success', 'Comentario enviado.');
    }

}

