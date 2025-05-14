<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Book;

class BookDeleted extends Notification
{
    use Queueable;
    /*
    // avant php 8.0
    protected Book $book;

    public function __construct($book)
    {
      $this->book = $book;
    }
*/

     // depuis php 8.0
     public function __construct(protected Book $book)
     {
       logger($this->book->id);
     }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
      logger($this->book->name);
        return [
            'book_id' => $this->book->id,
            'name' => $this->book->name,
        ];
    }
}
