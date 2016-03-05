<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
    'user_id',
    'bio',
    'github',
    'linkedin',
    'resume',
    'profile_pic',
    'tagline',
    'location',
    'website'
    ];

    protected $table='user_profile';

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
