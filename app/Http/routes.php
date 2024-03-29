<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('imageupload',['as' => 'image.upload', 'uses' => 'ImageController@upload']);
     Route::post('imageupload',['as' => 'image.store', 'uses' => 'ImageController@store']);
   

    Route::get('/',['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/about',['as' => 'about' , 'uses' => 'HomeController@about']);

    Route::post('/readtags', 'AskController@readtags');


    Route::get('/profile/{user}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
    Route::get('/profile/{user}/questions', ['as' => 'users.questions.show', 'uses' => 'UsersController@showquestions']);
    Route::get('/profile/{user}/following', ['as' => 'users.showfollowing', 'uses' => 'UsersController@showfollowing']);



    Route::get('tags/{tag}', ['as' => 'tags.show', 'uses' => 'AskController@showtags']);
    Route::get('/tags',['as' => 'tags.all', 'uses' => 'AskController@alltags']);

    Route::get('questions/{question}', ['as' => 'questions.show', 'uses' => 'AskController@showquestions']);

    Route::get('/answers/{question}/create', ['as' => 'answers.create', 'uses' => 'AskController@answer']);

    Route::post('/answers/{question}', ['as' => 'answers.store', 'uses' => 'AskController@storeanswer']);

    Route::resource('ask','AskController');

    Route::get('/bookmark/{answer}', ['as' => "answers.bookmark" , 'uses' => 'AskController@bookmark']);

    Route::get('/bookmarks', ['as' => "users.bookmarks.show",'uses' => 'AskController@showbookmarks']);

    Route::get('/wantanswer/{question}',['as' => "questions.follow",'uses' => 'AskController@follow']);

    Route::get('/wantanswers',['as' => "users.wantanswers.show",'uses' => 'UsersController@wantanswers']);

    Route::delete('/wantanswers/{question}',['as' => 'users.wantanswers.destroy', 'uses' => 'UsersController@destroywantanswer']);

    Route::get('/profile/{user}/addbio',['as'=>'user.addbio','uses'=>'UsersController@createbio']);
    Route::patch('/profile/{user}/addbio',['as'=>'user.updatebio','uses'=>'UsersController@updatebio']);


    Route::get('/tags/{tag}/follow',['as' => 'tag.follow','uses' => 'AskController@followtag']);
    Route::get('/tags/{tag}/unfollow',['as' => 'tag.unfollow','uses' => 'AskController@unfollowtag']);

    Route::post('/follow',['as' => 'user.follow','uses' => 'UsersController@userfollow']);
    Route::post('/unfollow',['as' => 'user.unfollow','uses' => 'UsersController@userunfollow']);

    Route::get('/profile/{user}/addprofileimage',['as' => 'user.addprofileimage', 'uses' => 'UsersController@addprofileimage']);
    Route::patch('/profile/{user}/addprofileimage',['as'=>'user.updateprofileimage','uses'=>'UsersController@updateprofileimage']);

    Route::get('/reportbug',['as' => 'reportbug','uses' => 'UsersController@reportbug']);
    Route::post('/reportbug',['as' => 'addbug', 'uses' => 'UsersController@addbug']);


    Route::get('blog/create',['as' => 'blog.create', 'uses' => 'BlogsController@create']);

    Route::post('blog/create',['as' => 'blog.store', 'uses' => 'BlogsController@store']);  

    Route::get('blogs',['as' => 'blog.show', 'uses' => 'BlogsController@show']);    

    Route::get('blog/{blog}/article/create/',['as' => 'article.create', 'uses' => 'ArticlesController@create']);    
    Route::post('blog/{blog}/article/create/',['as' => 'article.store', 'uses' => 'ArticlesController@store']);    
});