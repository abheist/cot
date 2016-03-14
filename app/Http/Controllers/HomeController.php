<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


       $questions = Question::with([
            'user',
            'answers' => function($query){ 
                    $query->orderBy('created_at','desc');
                },
            'tags'
            ])->latest()->get(); 
        $user_bookmarks = array();
        foreach(Auth::user()->bookmarks as $bookmark)
            array_push($user_bookmarks, $bookmark->pivot->answer_id);
        return view('home',['questions' => $questions,'user_bookmarks' => $user_bookmarks]);
        
    }

    
}
