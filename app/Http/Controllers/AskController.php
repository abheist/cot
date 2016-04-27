<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Question;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class AskController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Auth::user()->questions()->latest()->get();
        return view('home',['questions' => $questions]);        
    }
    public function create()        
    {
        return view('ask.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,array(
            'question' => 'required|min:5',
            'tag1' => 'sometimes|required',
            'tag2' => 'sometimes|required|different:tag1',
            'tag3' => 'sometimes|required|different:tag1,tag2',
            ));
        $input = $request->except('_tagtoken'); 
        $input = array_map('trim',$input);
        $question = new Question($input);
        //var_dump($question);
        $user = User::find(Auth::id());
        $user->questions()->save($question);
        if(isset($input['tag1'])){
            $tag1 = Tag::where('name','=',$input['tag1'])->first();
            if($tag1==null && !empty($input['tag1'])){
                $tag = new Tag(['name' => $input['tag1']]);
                $tag->save();
                $question->tags()->attach($tag->id);
                Auth::user()->following_tags()->save(Tag::find($tag->id));
            }
            else{
                $question->tags()->attach($tag1->id);   
            }
        }
        if(isset($input['tag2'])){
            $tag2 = Tag::where('name','=',$input['tag2'])->first();
            if($tag2==null && !empty($input['tag2'])){
                $tag = new Tag(['name' => $input['tag2']]);
                $tag->save();
                $question->tags()->attach($tag->id);
                Auth::user()->following_tags()->save(Tag::find($tag->id));
            }
            else{
                $question->tags()->attach($tag2->id);   
            }
        }
        if(isset($input['tag3'])){
            $tag3 = Tag::where('name','=',$input['tag3'])->first();
            if($tag3==null && !empty($input['tag3'])){
                $tag = new Tag(['name' => $input['tag3']]);
                $tag->save();
                $question->tags()->attach($tag->id);
                Auth::user()->following_tags()->save(Tag::find($tag->id));
            }
            else{
                $question->tags()->attach($tag3->id);  
            }
        }
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
        $question = Question::find($question);
        $answer->user()->associate(Auth::user());
        $answer->question()->associate($question);
        $answer->save();
        return Redirect::route('home');
    }

   public function readtags(Request $request)
   {    
        $input = Input::all();
        $tags = Tag::where('name','LIKE','%'.$input['keyword'].'%')->get();
        $returnHTML =  view('readtags',['tags' => $tags])->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
   }

   public function showtags($tag)
   {    
        $tag = Tag::find($tag);
        $follow=0;
        foreach($tag->followers as $follower){
            if($follower->id == Auth::id()){
                $follow = 1;
            }
            else
                $follow = 0;
        }    
        return view('tag',['tag' => $tag, 'follow' => $follow ]);
   }

   public function alltags()
   {
        $tags = Tag::with([
            'followers'])->get();
      return view('showtags',['tags' => $tags]);
   }

   public function showquestions($question)
   {
        $question = Question::find($question);
        return view('question',['question' => $question]);
   }

   public function bookmark($answer)
   {
        Auth::user()->bookmarks()->attach($answer);
        return Redirect::back();
   }

   public function showbookmarks()
    {
        return view('showbookmarks');
    }

    public function follow($question)
    {
        $question = Question::find($question);
        Auth::user()->following_questions()->save($question);
        return Redirect::back();
    }

    public function followtag($tag)
    {
        $tag = Tag::find($tag);
        Auth::user()->following_tags()->save($tag);
        return Redirect::back();
    }

    public function unfollowtag($tag)
    {
        $tag = Tag::find($tag);
        Auth::user()->following_tags()->detach($tag);
        return Redirect::back();
    }
}

