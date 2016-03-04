<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::with('user','answers')->latest()->get();
        return view('home',['questions' => $questions]);
        //$answer = $questions->answers->first();
        //var_dump($answer->user);
    }

    
}
