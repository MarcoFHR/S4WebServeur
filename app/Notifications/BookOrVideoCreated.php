<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Book;
use App\Models\Video;

class BookOrVideoCreated extends Notification
{
    use Queueable;
    protected $notificationType;
    /**
     * Create a new notification instance.
     */
    public function __construct($object)
    {
        $this->notificationType = $object;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
      // logger('instanceof ' . get_class($this->notificationType));
      // logger('book ' . get_class($this->notificationType) instanceof Book);
      //   logger('appbook ' . get_class($this->notificationType) instanceof \App\Models\Book);
        if(get_class($this->notificationType) === 'App\Models\Book'){
          return (new MailMessage)
              ->line('Un nouveau livre a été ajouté: ' . $this->notificationType->title)
              ->action('Notification Action', url('/'));
        }
        else if(get_class($this->notificationType) === 'App\Models\Video'){
          return (new MailMessage)
              ->line('Une nouvelle video a été ajouté: ' . $this->notificationType->title)
              ->action('Notification Action', url('/'));
        }
        else{
          return (new MailMessage)->line('ERROR');
        }
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
