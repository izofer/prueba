<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
    	'ciudad'
    ];

    public  function User()
   	{
   		return $this->hasOne(User::class);
   	}
}
