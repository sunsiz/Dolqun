<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['user_id', 'title', 'body', 'type', 'status', 'clicks', 'thumb'];
}
