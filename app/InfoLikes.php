<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLikes extends Model
{
    protected $table = 'info_likes';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
