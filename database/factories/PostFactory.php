<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,2),
        'title' => $faker->sentence(3),
        'text' => $faker->text(1000),
        'active' => 1
    ];
});
