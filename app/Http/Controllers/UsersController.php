<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index($value='')
    {
    	return view('pages.register');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'email' => 'required|email',
            'password'  => 'required',
            'cnfrmpassword' => 'required|same:password'
        ]);
    	$input = $request->except('cnfrmpassword');
    	$input['password']=Hash::make($input['password']);
    	User::create($input);
    	return redirect('/')->with('status','User Registered');
    }

    public function login()
    {
    	return view('pages.login');
    }
}
