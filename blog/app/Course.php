<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table='courses';

	protected $primaryKey='course_id';

	protected $fillable=[
	'course_name'
	];

	public $timestamps=false;

	public function major(){
		return $this->hasMany('App/CourseMajor');
	}
}
