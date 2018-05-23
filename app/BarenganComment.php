<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarenganComment extends Model
{
    protected $fillable = ['user_id','barengan_id','comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barengan()
    {
        return $this->belongsTo(Barengan::class);
    }
}
