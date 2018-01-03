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
        return $this->hasMany(Post::class);
    }
}
