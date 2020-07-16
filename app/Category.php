<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'active'
    ];

    /**
     * ManyToMany relation with posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
