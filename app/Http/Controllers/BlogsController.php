<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class BlogsController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
   {
      $blogs = Blog::with('user')->latest()->get();
      return view('pages.home',['blogs' => $blogs]);
   }

   public function create()
   {
    return view('blog.create');
   }

   public function store(Request $request)
   {
      $this->validate($request,[
        'title'=>'min:3|max:255|required',
        'body'=>'min:3|required',
        'bio' => 'min:3|required',
        ]);
      $input = $request->except('_token');
      $blog = new Blog($input);
      $user = Auth::user();
      $user->blog()->save($blog);
      return Redirect::route('blog.show');
   }

   public function show()
   {
      $blog = Auth::user()->blog()->first();
      if(count($blog)){
        $articles = Article::where('blog_id','=',$blog->id)->get();
        
        return view('article.show',['articles'=>$articles]);
      }
      else
        return Redirect::intended('/blog/create');
   }

}
