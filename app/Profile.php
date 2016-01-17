<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = [
		'location','bio','facebook_username','twitter_username','github_username'
	];

    public function user()
    {
    	$this->belongsTo('App\User');
    }
}
