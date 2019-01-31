<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filghet extends Model
{
    protected $table = 'filghets';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'ug', 'zh', 'other', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function albums()
    {
        return $this->belongsToMany(Album::class, 'filghet_album')->withTimestamps();
    }
}
