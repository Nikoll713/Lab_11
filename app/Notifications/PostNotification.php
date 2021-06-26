<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Comment;
use App\Models\Post;

class PostNotification extends Notification
{
    use Queueable;

    public function __construct(Post $post,Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [ 
            'title' => $this->post->title,
            'user' => $this->comment->user->name,
        ];
    }
}
