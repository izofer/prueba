<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'user_name', 
        'email',
        'city_id',
        'role_id',
        'hobby',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }

    public function Hobby()
    {
        return $this->hasMany(Hobby::class); 
    }

    public function UserHobbies()
    {
        return $this->belongsToMany(Hobby::class,'user_hobbies','user_id','hobby_id');
    }
}
