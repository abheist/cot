<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    protected $table = 'user_education';

    protected $fillable=[
    'user_id',
    'college_id',
    'college_start_year',
    'college_end_year',
    'course_major_id'
    ];

    public $timestamps=false;
    
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function college(){
    	return $this->belongsTo('App\College');
    }

    public function courseMajor(){
    	return $this->belongsTo('App\CourseMajor');
    }
}
