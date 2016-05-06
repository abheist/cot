<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'gender','password', 'password_confirmation',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function blog()
    {
        return $this->hasOne('App\Blog');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

     public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function followers()
    {
        return $this->morphToMany('App\User','followable','followables','followable_id','user_id');
    }

    public function following()
    {
        return $this->morphedByMany('App\User','followable','followables','user_id','followable_id');
    }

    public function following_questions()
    {
        return $this->morphedByMany('App\Question','followable','followables','user_id','followable_id');
    }

    public function following_tags()
    {
        return $this->morphedByMany('App\Tag','followable','followables','user_id','followable_id');
    }
 
    public function bookmarks()
    {
        return $this->belongstoMany('App\Answer','user_bookmarks')->withTimestamps();
    }
}
