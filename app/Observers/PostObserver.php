<?php

namespace App\Observers;

use App\Events\NewPostEvent;
use App\Post;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post)
    {
        $this->fireNewPostEvent($post);
    }

    /**
     * Handle the post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        isset($post->getChanges()['active']) && $this->fireNewPostEvent($post);
    }

    /**
     * @param $post
     */
    private function fireNewPostEvent($post)
    {
        if ($post->active) {
            event(new NewPostEvent($post));
        }
    }
}
