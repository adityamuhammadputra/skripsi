<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinggahComment extends Model
{
    protected $table = 'singgah_reviews';
    protected $fillable = ['user_id','singgah_id','comment','ratting'];
    protected $appends = ['perhitungan'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function singgah()
    {
        return $this->belongsTo(Singgah::class);
    }


    public function getPerhitunganAttribute()
    {
        if($this->attributes['user_id']==auth()->id())
        {
            $ratting = 0;
        }
        else{
            $ratting = $this->attributes['ratting'];
        }
        $hitung = 1 * $ratting * 100 / 5 * 1;
        return $hitung;
    }
}
