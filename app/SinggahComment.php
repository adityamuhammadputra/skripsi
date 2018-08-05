<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinggahComment extends Model
{
    protected $table = 'singgah_reviews';
    protected $fillable = ['user_id','singgah_id','comment','ratting'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function singgah()
    {
        return $this->belongsTo(Singgah::class);
    }
}
