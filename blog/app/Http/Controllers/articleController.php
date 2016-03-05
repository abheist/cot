<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use File;
use App\User;
use App\Blog;
use App\Article;

class articleController extends Controller
{
	public function show($blog_code){
		$data=Blog::with('user.profile')->where('blog_code','=',$blog_code)->firstOrFail();
		$data->latest_articles=Article::where('blog_id','=',$data->blog_id)->latest('updated_at')->take(3)->get();
		$data->pop_articles=Article::where('blog_id','=',$data->blog_id)->orderByRaw('rand()')->take(3)->get();

		foreach($data->latest_articles as $article){
			if($article->cover_pic==null || !File::exists('article_pics/'.$article->cover_pic))
            $article->cover_pic= "coverpic.jpg";
        	$article->tags=explode(',', $article->tags);
		}

		foreach($data->pop_articles as $article){
			if($article->cover_pic==null || !File::exists('article_pics/'.$article->cover_pic))
            $article->cover_pic= "coverpic.jpg";
        	$article->tags=explode(',', $article->tags);
		}

		if($data->user->profile->profile_pic==null || !File::exists('user_profile_pics/'.$data->user->profile->profile_pic))
            $data->user->profile->profile_pic= "profilepic.jpg";
		//return $data;

		$user =User::with('profile')->whereId(Auth::user()->id)->firstOrFail();


		return view('blog.show')->with('blog',$data)->with('logInUser',$user);

	}

	public function store(Request $request){
			$this->validate($request,[
				'article_title'=>'min:3|max:255|required',
				'article_body'=>'min:100|required'
				]);
			$input= $request->all();
			$input['blog_id']=Blog::where('user_id','=',Auth::user()->id)->firstOrFail()->blog_id;

			$article=new Article($input);
			$article->save();
			return 1;
	}

	public function create(){
		$user=User::with('profile')->where('id','=',Auth::user()->id)->firstOrFail();

    	return view('blog.create')->with('logInUser',$user);
	}


    public function test(){
   		$user=User::with('profile')->where('id','=',Auth::user()->id)->firstOrFail();

    	return view('blog.test')->with('logInUser',$user);
    }

    public function test1(Request $request){
    	return $request->all();
    }
}
