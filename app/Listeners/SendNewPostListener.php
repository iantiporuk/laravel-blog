<?php

namespace App\Listeners;

use App\Events\NewPostEvent;
use App\Notifications\NewPostNotification;
use App\Subscription;
use Illuminate\Support\Facades\Notification;

class SendNewPostListener
{

    /**
     * Handle the event.
     *
     * @param NewPostEvent $event
     * @return void
     */
    public function handle(NewPostEvent $event)
    {
        Notification::send(Subscription::all(), new NewPostNotification($event->post));
    }
}
