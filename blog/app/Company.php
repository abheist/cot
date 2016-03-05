<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='companies';

    protected $primaryKey='company_id';

    protected $fillable=[
    'company_name',
    'company_location',
    'company_description',
    'company_logo'
    ];

    public $timestamps=false;

    public function experience(){
    	return $this->hasMany('App\Experience');
    }
}
