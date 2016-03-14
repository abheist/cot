<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	protected $fillable = ['answer'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function question()
	{
		return $this->belongsTo('App\Question');
	}

	public function bookmarkedby()
	{
		return $this->belongstoMany('App\User','user_bookmarks')->withTimestamps();
	}
}
