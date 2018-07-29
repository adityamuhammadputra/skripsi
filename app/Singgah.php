<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singgah extends Model
{
    protected $fillable = ['user_id','lokasi','content','contact','category'];

    protected $appends = ['total_ratting'];

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

    public function likecek()
    {
        return $this->hasMany(SinggahLikes::class)->where('user_id',auth()->id());
    }

    public function getTotalRattingAttribute()
    {
        $total = $this->singgahcomment->filter(function ($value, $key) {
            return $value->ratting;

            // $collection->pull('name');
        });

        // return $this->attributes['mulai'] = (new Carbon($value))->format('d M Y');

        
        return $total;
    }

    
}
