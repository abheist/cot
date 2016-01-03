<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	protected $fillable = [
        'blog_title', 'blog_body',
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
