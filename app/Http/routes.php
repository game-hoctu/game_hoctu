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

Route::get('home','HomeController@index');
route::get('list','ParentsController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'parents'], function(){
	Route::get('select-all', function(){
		//$data = App\Parents::all();
		echo json_encode(['response' => 'Message!']);
	});
});
/*route::get('register', function()
{
	return view('parents.register');
});
route::POST('register-form',['as'=>'register-form', 'uses'=>'ParentsController@register']);*/
route::get('getlist','ParentsController@getlist');
Route::get('parent/{id}/edit','ParentsController@edit');
Route::post('parent/{id}/update','ParentsController@update');
Route::get('parent/{id}/delete', 'ParentsController@delete');
//Xem image trong album
/*Route::get('{id_image}', function($id_mage) {
	$image =  DB::table('images')->where('id_image','=',$id_image)->first();
	$allAlbum=DB::table('albums')->get();
    return view('pages.nghenhac')->with('allAlbum',$allAlbum)
    						 	->with('image',$image);
});
//trang chủ
Route::get('trangchu', function () {
	$allAlbum=DB::table(albums)->get();
	$image = DB::table('images')->get();
    return view('images.home')->with('allAlbum',$allAlbum);
});*/
//Trang Register
route::get('authentication/getregister',['as'=>'getregister','uses'=>'Auth\AuthController@getregister']);
route::post('authentication/postregister',['as'=>'postregister','uses'=>'Auth\AuthController@postregister']);
//Trang login
route::get('authentication/getlogin',['as'=>'getlogin','uses'=>'Auth\AuthController@getlogin']);
route::post('authentication/postlogin',['as'=>'postlogin','uses'=>'Auth\AuthController@postlogin']);
//Thêm thể loại
route::get('categories/getadd',['as'=>'getadd','uses'=>'CategoriesController@getadd']);
route::post('categories/postadd',['as'=>'postadd','uses'=>'CategoriesController@postadd']);
//Danh sách thể loại
route::get('getlistcategories','CategoriesController@getlistcate');
//Cập nhật thông tin thể loại
Route::get('categories/{id}/edit','CategoriesController@edit');
Route::post('categories/{id}/update','CategoriesController@update');
Route::get('categories/{id}/delete', 'CategoriesController@delete');
//Tạo album
route::get('album/getaddalbum',['as'=>'getaddalbum','uses'=>'AlbumsController@getaddalbum']);
route::post('album/postaddalbum',['as'=>'postaddalbum','uses'=>'AlbumsController@postaddalbum']);