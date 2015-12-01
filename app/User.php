<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users_main';

	public $timestamps = false;


    protected $fillable=[
    'user_fname',
    'user_lname',
    'user_dob',
    'user_email',
    'user_password',
    'user_name',
    'user_created',
    ];
}