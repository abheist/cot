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
        'fname', 'lname', 'email', 'password', 'user_name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function blog(){
        return $this->hasOne('App\Blog');
    }


    public function profile(){
        return $this->hasOne('App\Profile');
    }

    public function projects(){
        return $this->hasMany('App\Projects');
    }

    public function experience(){
        return $this->hasMany('App\Experience');
    }

    public function userSkill(){
        return $this->hasMany('App\UserSkill');
      }

    public function userInterest(){
        return $this->hasMany('App\UserInterest');
    }

    public function education(){
        return $this->hasMany('App\UserEducation');
    }

    public function recommendee(){
        return $this->hasMany('App\UserRecommendation','user_id');
    }

    public function recommender(){
        return $this->hasMany('App\UserRecommendation','recommender_id');
    }
    

}
