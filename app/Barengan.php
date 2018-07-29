<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Barengan extends Model
{
    // use Searchable;

    protected $fillable = ['user_id','content','tujuan','mepo','mulai','akhir','contact'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barengancomments()
    {
        return $this->hasMany(BarenganComment::class);
    }

    public function barengangabung()
    {
        return $this->hasMany(BarenganGabung::class);
    }

    public function barengangabungcek()
    {
        return $this->hasMany(BarenganGabung::class)->where('user_id',auth()->id());
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function getMulaiAttribute($value)
    {
        return $this->attributes['mulai'] = (new Carbon($value))->format('d M Y');
    }

    public function getAkhirAttribute($value)
    {
        return $this->attributes['akhir'] = (new Carbon($value))->format('d M Y');
    }

    public function scopeFiltered($query)
    {
        //unutk rekuest dari ajax tergantung apa yang dimntanya
        // $query->when(isset(request('search')['value']), function ($query) {
        //     $query->where(function ($query) {
        //         $param = '%' . request('search')['value'] . '%';
        //         $query->where('id', 'like', $param)
        //             ->orWhere('tujuan', 'like', $param)
        //             ->orWhere('mepo', 'like', $param);
        //     });
        // });

        $query->when(request('q'), function ($query) {
            $query->where(function ($query) {
                $param = '%' . request('q') . '%';
                $query->where('id', 'like', $param)
                    ->orWhere('tujuan', 'like', $param)
                    ->orWhere('mepo', 'like', $param);
            });
        });
    }
}
