<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $table='user_skills';

    protected $fillable=[
    'user_id',
    'skill_id'
    ];

    public $timestamps=false;

   	public function user(){
   		return $this->belongsTo('App\User');
   	}

   	public function skill(){
   		return $this->belongsTo('App\Skill');
   	}
}
