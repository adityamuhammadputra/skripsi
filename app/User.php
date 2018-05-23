<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Query\Builder;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active', 'activation_token', 'status', 'avatar', 'pekerjaan', 'agama', 'hobby', 'bio', 'contact','alamat',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function scopeByActivationColumns(Builder $builder, $email, $token){
    //     return $builder->where('email', $email)->where('activation_token', $request->token)
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
