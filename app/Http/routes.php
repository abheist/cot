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

    Route::get('/',['as' => 'home', 'uses' => 'HomeController@index']);

    Route::post('/readtags', 'AskController@readtags');


    Route::get('/profile/{user}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
    Route::get('/profile/{user}/questions', ['as' => 'users.questions.show', 'uses' => 'UsersController@showquestions']);

    
    Route::get('/answers/{question}/create', ['as' => 'answers.create', 'uses' => 'AskController@answer']);

    Route::post('/answers/{question}', ['as' => 'answers.store', 'uses' => 'AskController@storeanswer']);

    Route::resource('ask','AskController');
});
