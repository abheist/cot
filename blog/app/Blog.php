<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
    protected $fillable=[
    'user_id',
    'blog_name',
    'blog_desc'
    ];

    protected $primaryKey='blog_id';
    
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function articles(){
    	return $this->hasMany('App\Article');
    }
}
