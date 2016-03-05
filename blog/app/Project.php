<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='user_projects';

    protected $fillable=[
    'project_title',
    'project_desc',
    'project_started',
    'project_ended'
    ];

    public $timestamps=false;
    
    protected $primaryKey= 'project_id';

    // protected $dates = ['project_started','project_ended'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function scopeLimitProjects($query,$limit){
    	return $this->take($limit);
    }
}
