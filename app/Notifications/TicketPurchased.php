<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketPurchased extends Notification
{
    use Queueable;

    protected $ticket;

    /**
     * Create a new notification instance.
     *
     * @param $ticket
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmación de compra de boletos')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Gracias por tu compra. A continuación, los detalles de tu pedido:')
            ->line('Evento: ' . $this->ticket->event->title)
            ->line('Ubicación: ' . $this->ticket->event->location)
            ->line('Fecha: ' . $this->ticket->event->date->format('d/m/Y H:i'))
            ->line('Boletos adquiridos: ' . $this->ticket->pivot->quantity)
            ->line('Precio total: $' . number_format($this->ticket->pivot->quantity * $this->ticket->price, 2))
            ->action('Ver detalles del evento', url('/events/' . $this->ticket->event->id))
            ->line('¡Gracias por confiar en nosotros y disfrutar de este evento!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'event_title' => $this->ticket->event->title,
            'quantity' => $this->ticket->pivot->quantity,
            'total_price' => $this->ticket->pivot->quantity * $this->ticket->price,
        ];
    }
}
