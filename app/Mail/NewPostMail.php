<?php

namespace App\Mail;

use App\Post;
use App\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Post
     */
    private $post;
    /**
     * @var Notifiable
     */
    private $subscription;

    /**
     * Create a new message instance.
     *
     * @param Post $post
     * @param Subscription $subscription
     */
    public function __construct(Post $post, Subscription $subscription)
    {
        $this->post = $post;
        $this->subscription = $subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new_post', ['post' => $this->post, 'subscription' => $this->subscription]);
    }

}
