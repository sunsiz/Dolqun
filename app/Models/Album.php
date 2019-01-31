<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    protected $fillable = [
        'name_ug', 'name_zh', 'bio', 'thumb', 'words_count'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function filghets()
    {
        return $this->belongsToMany(Filghet::class, 'filghet_album')->withTimestamps();
    }
}
