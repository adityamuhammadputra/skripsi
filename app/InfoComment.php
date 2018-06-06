<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoComment extends Model
{
    protected $fillable = ['user_id','info_id','comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function info()
    {
        return $this->belongsTo(Info::class);
    }
}
