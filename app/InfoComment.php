<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class InfoComment extends Model
{
    protected $table = 'info_reviews';
    protected $fillable = ['user_id','info_id','comment','ratting'];
    protected $appends = ['perhitungan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function info()
    {
        return $this->belongsTo(Info::class);
    }

    public function getPerhitunganAttribute()
    {
        if ($this->attributes['user_id'] == auth()->id()) {
            $ratting = 0;
        } else {
            $ratting = $this->attributes['ratting'];
        }
        $hitung = 1 * $ratting * 100 / 5 * 1;
        return $hitung;
    }
}
