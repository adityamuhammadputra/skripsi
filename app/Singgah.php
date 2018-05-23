<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singgah extends Model
{
    protected $fillable = ['user_id','content','contact','category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function singgah_comment()
    {
        return $this->hasMany(singgah_comment::class);
    }
}
