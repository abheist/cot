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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $user = User::findOrFail($user);
        $follow=0;
        foreach($user->followers as $follower){
            if($follower->id == Auth::id()){
                $follow = 1;
            }
            else
                $follow = 0;
        }

        $path = public_path()."/images/profilepics/";
        $pics = scandir($path,1);
        $pattern = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-".$user->id.".[a-z]{3,}$/";
        $userimages= preg_grep($pattern,$pics);
        if(count($userimages))
            $userprofilepic = "images/profilepics/".array_values($userimages)[0];
        else{
            if($user->gender=='M')
                $userprofilepic =  "profile_default.png";
            else
                $userprofilepic = "profile_women.png";
        }

        $answers = Answer::with('user','question')->where('user_id',$user->id)->latest()->get();
        return view('useranswer',['answers' => $answers, 'user' => $user, 'follow' => $follow, 'userprofilepic' => $userprofilepic]);
    }

    public function showquestions($user)
    {
        $user = User::findOrFail($user);
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
        $user = User::findOrFail($user);
        if($user->id == Auth::id())
            return view('addbio',['user' => $user]);
        abort(404);
    }

    public function updatebio(Request $request, $user)
    {
        $this->validate($request,[
            'bio' => 'required|min:3'
            ]);
        $user = User::find($user);
        $user->bio = $request->bio;
        $user->save();
        return Redirect::route('users.show',['user' => $user->id]);
    }

    public function userfollow(Request $request)
    {
        $input = Input::all();
        $usertofollow = User::find($input['usertofollow']);
        Auth::user()->following()->save($usertofollow);
        return response()->json(array('success' => true,'userto' => $usertofollow,'followers' => count($usertofollow->followers)));

    }

    public function userunfollow(Request $request)
    {
        $input = Input::all();
        $usertounfollow = User::find($input['usertounfollow']);
        Auth::user()->following()->detach($usertounfollow);
        return response()->json(array('success' => true));       
    }

    public function addprofileimage($user)
    {
        $user = User::findOrFail($user);
        if($user->id == Auth::id())
            return view('addprofileimage',['user' => $user]);
        abort(404);
    }

    public function updateprofileimage(Request $request,$user)
    {
        $user = User::findOrFail($user);
        if($user->id != Auth::id())
           return Redirect::route('users.show',['user' => $user->id]);
        $this->validate($request,[
                'image' => 'required'
            ]);
        if($request->hasFile('image'))
        {
            $image = Input::file('image');
            $imagename = $image->getClientOriginalName();
            $temp = explode('.', $imagename);
            $imageext = end($temp);
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$user->id.".".$imageext;
            $image->filePath = $name;
            $image->filePath = $name;
            $image->move(public_path().'/images/profilepics', $name);
             return Redirect::route('users.show',['user' => $user->id]);
        }   
    }
}
