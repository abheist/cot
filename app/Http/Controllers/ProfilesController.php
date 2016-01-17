<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
	public function show($userid)
	{
		try
		{
			$user = User::with('profile')->whereId($userid)->firstOrFail(); 
		}
		catch(ModelNotFoundException $e){
			return view('pages.home');
		}
		return view('profiles.show')->withUser($user);			
	}    
}
