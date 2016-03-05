<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

	protected $table='user_experience';

	protected $fillable=[
	'user_id',
	'company_id',
	'experience_start_year',
	'experience_end_year',
	'position'
	]; 

	public $timestamps=false;

    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function employees(){
    	return $this->belongsTo('App\User');
    }
}
