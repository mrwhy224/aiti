<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class SmsChannel
{
    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        // Your logic to call the custom SMS API will go here.
        // This is the class you should build out as described in the previous guide.
    }
}
