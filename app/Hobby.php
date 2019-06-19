<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = [
    	'hobby'
    ];

    public function User()
    {
    	return $this->belongsTo(User::class);	
    }
}
