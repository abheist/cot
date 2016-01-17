<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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

	public function edit($userid)
	{
		$user = User::with('profile')->whereId($userid)->firstOrFail(); 
		return view('profiles.edit')->withUser($user);
	}

	public function update($userid,Request $request)
	{	
		$this->validate($request, [
            'location' => 'required',
            'bio' => 'required',
            'facebook_username' => 'required',
            'twitter_username'  => 'required',
            'github_username' => 'required'
        ]);
		$user = User::with('profile')->whereId($userid)->firstOrFail(); 
		$input = Input::only('location','bio','facebook_username','twitter_username','github_username');
		$user->profile->fill($input)->save();
		return Redirect::route('profile.edit',$user->id); 
	}
}
