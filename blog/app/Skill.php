<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $primaryKey='skill_id';

    protected $fillable=[
    'skill_name'
    ];

    protected $table='skills';

    public $timestamps=false;

    public function skills(){
    	return $this->hasMany('App\UserSkill');
    }

    public function interest(){
    	return $this->hasMany('App\UserInterest');
    }
}
