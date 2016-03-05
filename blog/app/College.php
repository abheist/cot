<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table='colleges';

    protected $fillable=[
    'college_name',
    'college_location',
    'college_desciption',
    'college_logo'
    ];

    protected $primaryKey='college_id';

    public $timestamps=false;

    public function education(){
    	return $this->hasMany('App\UserEducation');
    }

}
