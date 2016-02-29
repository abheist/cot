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


Route::get('/',['middleware' => ['web','auth'],'as' => 'home',function (){
		return view('pages.home');
}]);	



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

	
	Route::resource('questions', 'QuestionsController');

	Route::get('blog', 'BlogsController@index');

	Route::get('register','UsersController@index');
	Route::post('register', 'UsersController@store');

	Route::get('login', 'UsersController@login');
	Route::post('login', 'UsersController@loggedin');
	
	Route::get('logout', [
		'as' => 'user.logout',
		'uses' => 'UsersController@destroy'
	]);

	Route::get('create', 'BlogsController@create');
	Route::post('create', 'BlogsController@store');

	Route::resource('profile','ProfilesController', ['only'=> ['show','edit','update']]);


	Route::get('/{profile}', [
		'as' => 'profile',
		'uses' =>'ProfilesController@show'
	]);




});

