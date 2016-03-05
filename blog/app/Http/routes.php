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

Route::get('/', function () {
    return view('welcome');
});

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
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::resource('user', 'userController');

    Route::resource('article','articleController');


    Route::get('edit',['as'=>'profile','uses'=>'userController@edit']);

    //Route the userName/blogName to respective routes


    Route::get('/{username}','userController@show')->where('username','[a-zA-Z][a-zA-Z0-9]+');

    Route::get('/{name}','articleController@show')->where('name','@[a-zA-Z][a-zA-Z0-9]+');
});
