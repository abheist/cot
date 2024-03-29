<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question','anonymous'];

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

    public function followers()
    {
        return $this->morphToMany('App\User','followable','followables','followable_id','user_id');
    }
}
