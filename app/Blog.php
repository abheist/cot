<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	protected $fillable = [
        'title', 'body','bio',
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function articles()
    {
    	return $this->hasMany('App\Article');
    }
}
