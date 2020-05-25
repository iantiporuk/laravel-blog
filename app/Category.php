<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * ManyToMany relation with posts
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
