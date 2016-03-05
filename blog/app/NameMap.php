<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameMap extends Model
{
    protected $table="name_map";

    protected $fillable=[
    'name',
    'name_type'
    ];

    public $timestamps=false;

}
