<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecommendation extends Model
{
    protected $table='user_recommendations';

    protected $fillable=[
    'user_id',
    'recommender_id',
    'recommendation'
    ];

    public $timestamps=false;

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function recommender(){
    	return $this->belongsTo('App\User');
    }
}
