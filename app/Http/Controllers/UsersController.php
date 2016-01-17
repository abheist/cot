<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index()
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
    	$input = $request->except('cnfrmpassword','_token');
    	$input['password']=Hash::make($input['password']);
    	$user=User::create($input);
    	Auth::login($user);
    	return Redirect::intended('/');
    }

    public function login()
    {
    	return view('pages.login');
    }

    public function loggedin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email||exists:users,email',
            'password'  => 'required'
        ]);
        $input = $request->only('email','password');
        if(Auth::attempt($input))
        {
           return Redirect::intended('/');
        }
        else
            return redirect('login');
    }

    public function destroy()
    {
    	Auth::logout();
    	return Redirect::intended('/');
    }

    public function profile()
    {
        return view('pages.profile');
    }
}
