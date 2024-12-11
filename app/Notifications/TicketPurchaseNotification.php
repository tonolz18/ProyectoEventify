<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketPurchaseNotification extends Notification
{
    use Queueable;

    protected $event;
    protected $ticket;
    protected $quantity;

    public function __construct($event, $ticket, $quantity)
    {
        $this->event = $event;
        $this->ticket = $ticket;
        $this->quantity = $quantity;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Resumen de tu compra para ' . $this->event->title)
            ->view('emails.ticket_purchase', [
                'notifiable' => $notifiable,
                'event' => $this->event,
                'ticket' => $this->ticket,
                'quantity' => $this->quantity,
            ]);
    }
}
