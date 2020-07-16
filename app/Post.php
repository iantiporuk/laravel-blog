<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text', 'user_id', 'active', 'image'
    ];

    /**
     * ManyToMany relation with categories
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * OneToMany inverse relation with user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reattachCategories($categories)
    {
        $this->categories()->detach();
        $this->categories()->attach($categories);
    }
}
