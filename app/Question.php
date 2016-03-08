<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    protected $primaryKey = 'id';
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function answers()
    {
    	return $this->hasMany('App\Answer');
    }

    public function tags()
    {
    	return $this->belongstoMany('App\Tag');
    }


}
