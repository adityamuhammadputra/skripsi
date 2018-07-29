<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarenganGabung extends Model
{
    protected $table = 'barengan_gabung';
    protected $fillable = ['user_id','barengan_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barengan()
    {
        return $this->belongsTo(Barengan::class);
    }
}
