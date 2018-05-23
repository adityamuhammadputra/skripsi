<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillabel = ['user_id','images','caption'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
