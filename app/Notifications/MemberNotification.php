<?php

namespace App\Notifications;

use AllowDynamicProperties;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

enum MessageType: string  {
    case System = 'SYSTEM';
    case User = 'USER';
}
#[AllowDynamicProperties] class MemberNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public function __construct($message, MessageType $message_type, User $sender = null, $channels = ['database'])
    {
        $this->message = $message;
        $this->message_type = $message_type;
        $this->channels = $channels;
        $this->sender = $sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */

    public function via(User $notifiable): array
    {
        return $this->channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }
    public function toDatabase(User $notifiable): array
    {
        return ['message'=>$this->message, 'type'=>$this->message_type, 'user_id'=>$this->message_type==MessageType::User?$this->sender->id:null];
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
