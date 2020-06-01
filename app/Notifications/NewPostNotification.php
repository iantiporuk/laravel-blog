<?php

namespace App\Notifications;

use App\Mail\NewPostMail;
use App\Post;
use App\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewPostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Post
     */
    private $post;

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
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
     * @param Subscription $subscription
     * @return NewPostMail
     */
    public function toMail(Subscription $subscription)
    {
        info('toMail');
        return (new NewPostMail($this->post, $subscription))->to($subscription->email);
    }

}
