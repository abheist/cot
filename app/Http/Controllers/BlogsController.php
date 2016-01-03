<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
   public function index()
   {
   	$blogs = Blog::all();
   	return view('pages.home',['blogs' => $blogs]);
   }

   public function create()
   {
   	return view('pages.create');
   }

   public function store(Request $request)
   {
   	$this->validate($request, [
            'blog_title' => 'required|min:3',
            'blog_body' => 'required|min:3',
        ]);
   	$input = $request->except('_token');
    $blog = new Blog($input);
    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $blog = $user->blogs()->save($blog);
    return redirect('/');
   }
}
