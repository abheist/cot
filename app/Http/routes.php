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

    Route::post('/readtags', 'AskController@readtags');


    Route::get('/profile/{user}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
    Route::get('/profile/{user}/questions', ['as' => 'users.questions.show', 'uses' => 'UsersController@showquestions']);

    Route::get('tags/{tag}', ['as' => 'tags.show', 'uses' => 'AskController@showtags']);
    Route::get('questions/{question}', ['as' => 'questions.show', 'uses' => 'AskController@showquestions']);

    Route::get('/answers/{question}/create', ['as' => 'answers.create', 'uses' => 'AskController@answer']);

    Route::post('/answers/{question}', ['as' => 'answers.store', 'uses' => 'AskController@storeanswer']);

    Route::resource('ask','AskController');

    Route::get('/follow/{user}', ['as' => 'users.follow', 'uses' => 'UsersController@follow']);

    Route::get('/bookmark/{answer}', ['as' => "answers.bookmark" , 'uses' => 'AskController@bookmark']);

    Route::get('/bookmarks', ['as' => "users.bookmarks.show",'uses' => 'AskController@showbookmarks']);

    Route::get('/wantanswer/{question}',['as' => "questions.follow",'uses' => 'AskController@follow']);

    Route::get('/wantanswers',['as' => "users.wantanswers.show",'uses' => 'UsersController@wantanswers']);
});