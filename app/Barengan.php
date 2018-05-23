<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barengan extends Model
{
    protected $fillable = ['user_id','category_id','content','tujuan','mepo','mulai','akhir','contact'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function barengancomment()
    {
        return $this->hasMany(BarenganComment::class);
    }
}
