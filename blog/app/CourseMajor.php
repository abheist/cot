<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMajor extends Model
{
    protected $table='course_major';

    protected $primaryKey='course_major_id';

    protected $fillable=[
    'course_id',
    'course_major_name'
    ];

    public $timestamps=false;

    public function course(){
    	return $this->belongsTo('App\Course');
    }

    public function education(){
    	return $this->hasMany('App\Education');
    }
}
