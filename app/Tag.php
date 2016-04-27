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

  	public function followers()
    {
        return $this->morphToMany('App\User','followable','followables','followable_id','user_id');
    }
}
