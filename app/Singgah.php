<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singgah extends Model
{
    protected $fillable = ['user_id','lokasi','content','contact','category'];

    // protected $appends = ['total_ratting'];

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

    public function scopeFiltered($query)
    {
        $query->when(request('q'), function ($query) {
            $query->where(function ($query) {
                $param = '%' . request('q') . '%';
                $query->where('id', 'like', $param)
                    ->orWhere('lokasi', 'like', $param)
                    ->orWhere('category', 'like', $param)
                    ->orWhere('content', 'like', $param);
            });
        });
    }

    
}
