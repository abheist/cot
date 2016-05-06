<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ArticlesController extends Controller
{
  	public function __construct()
    {
        $this->middleware('auth');
    }
   public function create($blog)
   {
   		return view('article.create');
   }
   public function store(Request $request,$blog)
   {
   	$this->validate($request,[
        'title'=>'min:3|max:255|required',
        'body'=>'min:3|required',
        ]);
   	$input = $request->except('_token');
   	$article = new Article($input);
 	$blog = Blog::where('user_id','=',Auth::id())->first();
  	$blog->articles()->save($article);
  	return Redirect::route('blog.show');
   }
}
