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
// route::get('getlist','ParentsController@getlist');
// Route::get('parent/{id}/edit','ParentsController@edit');
// Route::post('parent/{id}/update','ParentsController@update');
// Route::get('parent/{id}/delete', 'ParentsController@delete');

route::get('categories/getadd',['as'=>'getadd','uses'=>'CategoriesController@getadd']);
route::post('categories/postadd',['as'=>'postadd','uses'=>'CategoriesController@postadd']);
//Danh sách thể loại
Route::group(['prefix' => 'albums'], function(){
	Route::get('myAlbum', 'AlbumsController@myAlbum');
	Route::get('/add','AlbumsController@add');
	Route::post('/postadd',['as'=>'albums_postadd','uses'=>'AlbumsController@postAdd']);
	Route::get('/{id}/edit','AlbumsController@edit');
	Route::post('/{id}/postedit',['as'=>'albums_postedit','uses'=>'AlbumsController@postEdit']);
	Route::get('/{id}/delete','AlbumsController@delete');
});

Route::group(['prefix' => 'categories'], function(){
	Route::get('all', 'CategoriesController@all');
	Route::get('/add','CategoriesController@add');
	Route::post('/postadd',['as'=>'cate_postadd','uses'=>'CategoriesController@postAdd']);
	Route::get('/{id}/edit','CategoriesController@edit');
	Route::post('/{id}/postedit',['as'=>'cate_postedit','uses'=>'CategoriesController@postEdit']);
	Route::get('/{id}/delete','CategoriesController@delete');
});	
//chỉnh sửa thông tin cá nhân
Route::group(['prefix' => 'users'], function(){
	Route::get('myProfile','UsersController@myProfile');
	Route::get('/{id}/edit','UsersController@edit');
	Route::post('/{id}/postedit',['as'=>'postedit','uses'=>'UsersController@postEdit']);
});

//ADMIN----------------------------------------------------------------------------------
Route::get('admin', function(){
	if(Auth::guest())
	{
		warning("Bạn cần phải đăng nhập để sử dụng chức năng này!");
		return view('auth.login');
	}
	elseif(Auth::user()->role < 3)
	{
		warning("Bạn không có quyền sử dụng chức năng này!");
		return redirect()->action('HomeController@index');
	}
	else
	{
		return view('admin.index');
	}	
});
Route::group(['prefix' => 'admin'], function(){
	Route::get('index',function(){
		if(Auth::guest())
		{
			warning("Bạn cần phải đăng nhập để sử dụng chức năng này!");
			return view('auth.login');
		}
		elseif(Auth::user()->role < 3)
		{
			warning("Bạn không có quyền sử dụng chức năng này!");
			return redirect()->action('HomeController@index');
		}
		else
		{
			return view('admin.index');
		}
	});
//thêm, sửa, xóa trang thể loại
	Route::get('categories','CategoriesController@getlist');
	Route::post('categories/ad_postadd',['as'=>'cate_postadd','uses'=>'CategoriesController@ad_postadd']);
	Route::get('categories/{id}/ad_edit','CategoriesController@ad_edit');
	Route::post('categories/{id}/ad_postedit',['as'=>'cate_postedit','uses'=>'CategoriesController@ad_postEdit']);
	Route::get('categories/{id}/ad_delete','CategoriesController@ad_delete');
//thêm, sửa, xóa trang albums
	Route::get('albums','AlbumsController@getlist');
	Route::post('albums/ad_postadd',['as'=>'albums_postadd','uses'=>'AlbumsController@ad_postadd']);
	Route::get('albums/{id}/ad_edit','AlbumsController@ad_edit');
	Route::post('albums/{id}/ad_postedit',['as'=>'albums_postedit','uses'=>'AlbumsController@ad_postEdit']);
	Route::get('albums/{id}/ad_delete','AlbumsController@ad_delete');
//thêm, sửa, xóa trang images
	Route::get('images','ImagesController@getlist');
	Route::post('images/ad_postadd',['as'=>'images_postadd','uses'=>'ImagesController@ad_postadd']);
	Route::get('images/{id}/ad_edit','ImagesController@ad_edit');
	Route::post('images/{id}/ad_postEdit',['as'=>'images_postEdit','uses'=>'ImagesController@ad_postEdit']);
	Route::get('images/{id}/ad_delete','ImagesController@ad_delete');
//thêm, sửa, xóa trang users
	Route::get('users','UsersController@getlist');
	Route::post('users/ad_postadd',['as'=>'users_postadd','uses'=>'UsersController@ad_postadd']);
	Route::get('users/{id}/ad_edit','UsersController@ad_edit');
	Route::post('users/{id}/ad_postedit',['as'=>'users_postedit','uses'=>'UsersController@ad_postEdit']);
	Route::get('users/{id}/ad_delete','UsersController@ad_delete');
});
