<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AskController extends Controller
{
   
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$questions = Auth::user()->questions()->latest()->get();
       	//$questions = Question::with('user')->where('user_id',Auth::id())->latest()->get();
		return view('home',['questions' => $questions]);		
	}
    public function create()		
    {
    	return view('ask.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,array(
    		'question' => 'required|min:5'
    		));
    	$input = $request->except('_token'); 
    	$input = array_map('trim',$input);
    	$question = new Question($input);
    	$user = User::find(Auth::id());
    	$user->questions()->save($question);
    	return Redirect::route('home');
    }

    public function answer($question)
    {
    	$question = Question::find($question);
    	return view('ask.answer',['question' => $question]);
    }

    public function storeanswer(Request $request,$question)
    {
    	$this->validate($request,[
    			'answer' => 'required'
    		]);
    	$input = $request->except('_token');
    	$input = array_map('trim',$input);
    	$answer = new Answer($input);
    	//$user = User::find(Auth::id());
    	$question = Question::find($question);
    	$answer->user()->associate(Auth::user());
    	$answer->question()->associate($question);
    	$answer->save();
    	return Redirect::route('home');
    }
}
