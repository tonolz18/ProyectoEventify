<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class EventUpdated extends Mailable
{
    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function build()
    {
        return $this->view('emails.event_updated')
            ->with(['event' => $this->event])
            ->subject('Actualización del Evento: ' . $this->event->title);
    }
}


