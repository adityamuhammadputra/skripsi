<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['user_id','category_id','title','content','images'];
    protected $appends = ['icon'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function infocomment()
    {
        return $this->hasMany(InfoComment::class);
    }

    public function infolike()
    {
        return $this->hasMany(InfoLikes::class);
    }

    public function likecek()
    {
        return $this->hasMany(InfoLikes::class)->where('user_id',auth()->id());
    }

    public function getIconAttribute($value)
    {
        $category = $this->attributes['category_id'];
        if($category == 1)
        {
            return 'fa fa-area-chart bg-aqua';
        }
        else if($category == 2)
        {
            return 'fa fa-umbrella bg-blue';
        }
        else if($category == 3)
        {
            return 'fa fa-umbrella bg-red';
        }
        else if($category == 4)
        {
            return 'fa fa-umbrella';
        }
        else{
            return 'fa fa-adjust bg-gray';
        }
    }

    
   
}
