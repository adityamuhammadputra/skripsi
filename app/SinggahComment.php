<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinggahComment extends Model
{
    protected $fillable = ['user_id','singgah_id','comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function singgah()
    {
        return $this->belongsTo(Singgah::class);
    }
                                                          
}
