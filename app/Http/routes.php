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
		$data = App\Albums::select('id','name','description','users_id','categories_id')->get();
		echo json_encode(['info' => $data]);
	});
});

Route::group(['prefix' => 'images'], function(){
	Route::get('list-image/{album_id}', function($album_id){
		$data = App\Images::where('album_id', $album_id)->get();
		echo json_encode(['info' => $data]);
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
// route::get('Parents/Register',['as'=>'Register','uses'=>'Auth\AuthController@Register']);
// route::post('Parents/postRegister',['as'=>'postRegister','uses'=>'Auth\AuthController@postRegister']);
// //Trang login
// route::get('authentication/getlogin',['as'=>'getlogin','uses'=>'Auth\AuthController@getlogin']);
// route::post('authentication/postlogin',['as'=>'postlogin','uses'=>'Auth\AuthController@postlogin']);
//Thêm thể loại
route::get('categories/getadd',['as'=>'getadd','uses'=>'CategoriesController@getadd']);
route::post('categories/postadd',['as'=>'postadd','uses'=>'CategoriesController@postadd']);
//Danh sách thể loại
//Cập nhật thông tin thể loại
Route::get('categories/{id}/edit','CategoriesController@edit');
Route::post('categories/{id}/update','CategoriesController@update');
Route::get('categories/{id}/delete', 'CategoriesController@delete');
//Tạo album


Route::group(['prefix' => 'albums'], function(){
	Route::get('myAlbum', 'AlbumsController@myAlbum');
	route::get('insert',['as'=>'insert','uses'=>'AlbumsController@insert']);
	route::post('postInsert',['as'=>'postInsert','uses'=>'AlbumsController@postInsert']);
});

Route::group(['prefix' => 'categories'], function(){
	Route::get('all', 'CategoriesController@all');
});	
//chỉnh sửa thông tin cá nhân
Route::group(['prefix' => 'users'], function(){
	Route::get('/myProfile','UsersController@myProfile');
	Route::get('/{id}/edit','UsersController@edit');
	Route::post('/{id}/update','UsersController@update');
});
Route::group(['prefix'=>'admin']), function(){
});	