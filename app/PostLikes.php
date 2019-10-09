<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{
    protected $table = 'post_likes';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
