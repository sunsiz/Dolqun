<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'body', 'author', 'author', 'clicks', 'thumb', 'status', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
