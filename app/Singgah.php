<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singgah extends Model
{
    protected $fillable = ['user_id','lokasi','content','contact','category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function singgahcomment()
    {
        return $this->hasMany(singgahcomment::class);
    }

    public function singgahlike()
    {
        return $this->hasMany(SinggahLikes::class);
    }
}
