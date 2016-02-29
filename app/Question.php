<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = array(
    	'question',
    	'optiona',
    	'optionb',
    	'optionc',
    	'optiond',
    	'answer'
    );
}
