<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        'title', 'content', 'image', 'author_id', 'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function likes_to()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }
}
