<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Followable;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'fname' => 'required|regex:/^([a-zA-z]+\s{0,1})+$/|min:3',
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


    // to show specific users details

    public function show($user)
    {
        $user = User::find($user);
        $follow=0;
        foreach($user->followers as $follower){
            if($follower->id == Auth::id()){
                $follow = 1;
            }
            else
                $follow = 0;
        }
        $answers = Answer::with('user','question')->where('user_id',$user->id)->latest()->get();
        return view('useranswer',['answers' => $answers, 'user' => $user, 'follow' => $follow]);

    }

    public function showquestions($user)
    {
        $user = User::find($user);
        $follow=0;
        foreach($user->followers as $follower){
            if($follower->id == Auth::id()){
                $follow = 1;
            }
            else
                $follow = 0;
        }
        $questions = Question::with('user','answers')->where('user_id',$user->id)->latest()->get();
        return view('user',['questions' => $questions, 'user' => $user,'follow'=> $follow]);
    }



    public function follow($user)
    {
        Auth::user()->following()->save(User::find($user));
        return Redirect::back();
    }

    public function wantanswers()
    {
       $wantquestions = Auth::user()->following_questions()->get();
        return view('showwantanswers',['questions' => $wantquestions]);
    }

    public function destroywantanswer($question)
    {
        Auth::user()->following_questions()->detach($question);
        return Redirect::back();
    }

    public function createbio($user)
    {
        return view('addbio',['user' => $user]);
    }

    public function updatebio(Request $request, $user)
    {
        $this->validate($request,[
            'bio' => 'required|min:3'
            ]);
        $user = User::find($user);
        $user->bio = $request->bio;
        $user->save();
        var_dump($request->all());
    }
}
