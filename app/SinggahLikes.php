<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinggahLikes extends Model
{
    protected $table = 'singgah_likes';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
