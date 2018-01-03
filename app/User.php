<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'avatar', 'bio', 'created_at',
    ];

    protected $hidden = [
        'password', 'remember_token', 'updated_at',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'authors_followed', 'user_id', 'author_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'authors_followed', 'author_id', 'user_id');
    }

    public function liked_it()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
    }

    public function comments()
    {
        return $this->belongsToMany(Post::class, 'comments')->withPivot('comment')->withTimestamps();
    }
}
