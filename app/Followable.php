<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followable extends Model
{

	protected $fillable = ['type'];
    public function user()
    {
    	return $this->hasOne('App\User','id');
    }

 
    
    public function question()
    {
    	return $this->hasOne('App\Question','id');
    }

    public function tag()
    {
    	return $this->hasOne('App\Tag','id');
    }

}
