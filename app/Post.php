<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
    public function likes()
    {
        return $this->hasMany(PostLikes::class);
    }
 
    public function scopeFiltered($query)
    {

        $query->when(request('q'), function ($query) {
            $query->where(function ($query) {
                $param = '%' . request('q') . '%';
                $query->where('id', 'like', $param)
                    ->orWhere('content', 'like', $param);
            });
        });
    }

}
