<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Barengan extends Model
{
    use Searchable;

    protected $fillable = ['user_id','content','tujuan','mepo','mulai','akhir','contact'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barengancomments()
    {
        return $this->hasMany(BarenganComment::class);
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
}
