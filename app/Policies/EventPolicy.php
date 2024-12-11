<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;

class EventPolicy
{
    public function update(User $user, Event $event)
    {
        return $user->id === $event->organizer_id;
    }
}

