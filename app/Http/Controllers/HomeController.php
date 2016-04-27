<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Followable;
use App\Tag;

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
        
   $tempquestions = DB::table('questions')
        ->join('question_tag','question_tag.question_id','=','questions.id')->whereIn('question_tag.tag_id',function($query){
            $query->select('followable_id')
                ->from(with(new Followable)->getTable())
                ->where('user_id',Auth::id())
                ->where('followable_type','App\Tag');
        })
       ->select('questions.id')->distinct()->get();
             
       $followinguserquestions = DB::table('questions')
        ->join('answers','answers.question_id','=','questions.id')->whereIn('answers.user_id',array_column(Auth::user()->following->toArray(),"id"))->select('questions.id')->distinct()->get();

    $qids = array();

    foreach($tempquestions as $question){
        array_push($qids, $question->id);
    }
     foreach($followinguserquestions as $question){
        array_push($qids, $question->id);
    }
    
    $questions = Question::with([
            'user',
            'answers' => function($query){ 
                    $query->orderBy('created_at','desc');
                },
            'tags'
            ])->whereIn('id',$qids)->latest()->get(); 
      $user_bookmarks = array();
        foreach(Auth::user()->bookmarks as $bookmark)
            array_push($user_bookmarks, $bookmark->pivot->answer_id);

        $wantquestions = Auth::user()->following_questions()->get();
        $wids = array();
       foreach($wantquestions as $question)
            array_push($wids,$question->id);

        if(count($questions))
            return view('home',['questions' => $questions,'user_bookmarks' => $user_bookmarks,'wids' => $wids]);
        else{
            $tags = Tag::with([
            'followers'])->get();
      
           return view('showtags',['tags' => $tags]);
        }

    }
        
    public function about()
   {        
        return view('about');
   }  
    
}
