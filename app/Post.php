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
}
