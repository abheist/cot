<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['name'];

	protected $primaryKey = 'id';
	
	public function questions()
	{
		return $this->belongstoMany('App\Question');
	}
}
