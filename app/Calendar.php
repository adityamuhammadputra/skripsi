<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['judul', 'content', 'mulai', 'akhir'];

    public function barengan()
    {
        return $this->belongsTo(Barengan::class);
    }
}
