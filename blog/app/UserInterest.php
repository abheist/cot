<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    protected $table='user_interests';

    protected $fillable=[
    'user_id',
    'skill_id'
    ];

    public $timestamps=false;

   	public function user(){
   		return $this->belongsTo('App\User');
   	}

   	public function interest(){
   		return $this->belongsTo('App\Skill');
   	}
}
