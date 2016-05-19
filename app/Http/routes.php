<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'parents'], function(){
	Route::get('select-all', function(){
		$data = App\Parents::all();
		echo json_encode(['info' => $data]);
	});
});

Route::group(['prefix' => 'albums'], function(){
	Route::get('list', function(){
		$data = App\Albums::select('album_id','name','description','parent_id','cate_id')->get();
		echo json_encode(['info' => $data]);
	});
});

Route::group(['prefix' => 'images'], function(){
	Route::get('list-image/{album_id}', function($album_id){
		$data = App\Images::where('album_id', $album_id)->get();
		echo json_encode(['info' => $data]);
	});
});