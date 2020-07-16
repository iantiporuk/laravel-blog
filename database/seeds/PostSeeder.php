<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 12)->create()->each(function (Post $post) {
            $post->categories()->attach(rand(1,4));
        });
    }
}
