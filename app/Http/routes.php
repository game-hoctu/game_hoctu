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
	Route::get('{id}/edit','ImagesController@edit');
	Route::get('{albums_id}/addByAlbums','ImagesController@addByAlbums');
	Route::post('{albums_id}/postAddByAlbums',['as'=>'imagesPostAddByAlbums', 'uses' => 'ImagesController@postAddByAlbums']);
	Route::post('{id}/postEdit',['as'=>'imagesPostEdit','uses'=>'ImagesController@postEdit']);
	Route::get('{id}/delete','ImagesController@delete');
});
Route::group(['prefix' => 'childs'], function(){
	Route::get('myChild', 'ChildsController@myChild');
	Route::get('add','ChildsController@add');
	Route::post('postAdd',['as'=>'childsPostAdd','uses'=>'ChildsController@postAdd']);
	Route::get('{id}/edit','ChildsController@edit');
	Route::post('{id}/postEdit',['as'=>'childsPostEdit','uses'=>'ChildsController@postEdit']);
	Route::get('{id}/delete','ChildsController@delete');
	Route::get('{id}/detail','ChildsController@detail');
});
Route::group(['prefix' => 'albums'], function(){
	Route::get('myAlbum', 'AlbumsController@myAlbum');
	Route::get('add','AlbumsController@add');
	Route::post('postAdd',['as'=>'albumsPostAdd','uses'=>'AlbumsController@postAdd']);
	Route::get('{id}/edit','AlbumsController@edit');
	Route::post('{id}/postEdit',['as'=>'albumsPostEdit','uses'=>'AlbumsController@postEdit']);
	Route::get('{id}/delete','AlbumsController@delete');
	Route::get('{albums_id}/detail','AlbumsController@detail');
});

Route::group(['prefix' => 'categories'], function(){
	Route::get('all', 'CategoriesController@all');
	Route::get('add','CategoriesController@add');
	Route::post('postAdd',['as'=>'catePostAdd','uses'=>'CategoriesController@postAdd']);
	Route::get('{id}/edit','CategoriesController@edit');
	Route::post('{id}/postEdit',['as'=>'catePostEdit','uses'=>'CategoriesController@postEdit']);
	Route::get('{id}/delete','CategoriesController@delete');
});	
//chỉnh sửa thông tin cá nhân
Route::group(['prefix' => 'users'], function(){
	Route::get('myProfile','UsersController@myProfile');
	Route::get('{id}/edit','UsersController@edit');
	Route::get('{id}/detail','UsersController@detail');
	Route::post('{id}/postEdit',['as'=>'postedit','uses'=>'UsersController@postEdit']);
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
	Route::get('categories','CategoriesController@adGetList');
	Route::post('categories/adPostAdd',['as'=>'cateAdPostAdd','uses'=>'CategoriesController@adPostAdd']);
	Route::get('categories/{id}/adEdit','CategoriesController@adEdit');
	Route::post('categories/{id}/adPostEdit',['as'=>'cateAdPostEdit','uses'=>'CategoriesController@adPostEdit']);
	Route::get('categories/{id}/adDelete','CategoriesController@adDelete');
//thêm, sửa, xóa trang albums
	Route::get('albums','AlbumsController@adGetList');
	Route::post('albums/adPostAdd',['as'=>'albumsAdPostAdd','uses'=>'AlbumsController@adPostAdd']);
	Route::get('albums/{id}/adEdit','AlbumsController@adEdit');
	Route::post('albums/{id}/adPostEdit',['as'=>'albumsAdPostEdit','uses'=>'AlbumsController@adPostEdit']);
	Route::get('albums/{id}/adDelete','AlbumsController@adDelete');
//thêm, sửa, xóa trang images
	Route::get('images','ImagesController@adGetList');
	Route::post('images/adPostAdd',['as'=>'imagesAdPostAdd','uses'=>'ImagesController@adPostAdd']);
	Route::get('images/{id}/adEdit','ImagesController@adEdit');
	Route::post('images/{id}/adPostEdit',['as'=>'imagesAdPostEdit','uses'=>'ImagesController@adPostEdit']);
	Route::get('images/{id}/adDelete','ImagesController@adDelete');
//thêm, sửa, xóa trang users
	Route::get('users','UsersController@adGetList');
	Route::post('users/adPostAdd',['as'=>'usersAdPostAdd','uses'=>'UsersController@adPostAdd']);
	Route::get('users/{id}/adEdit','UsersController@adEdit');
	Route::post('users/{id}/adPostEdit',['as'=>'usersAdPostEdit','uses'=>'UsersController@adPostEdit']);
	Route::get('users/{id}/adDelete','UsersController@adDelete');
//thêm, sửa, xóa trang childs
	Route::get('childs','ChildsController@adGetList');
	Route::post('childs/adPostAdd',['as'=>'childsAdPostAdd','uses'=>'ChildsController@adPostAdd']);
	Route::get('childs/{id}/adEdit','ChildsController@adEdit');
	Route::post('childs/{id}/adPostEdit',['as'=>'childsAdPostEdit','uses'=>'ChildsController@adPostEdit']);
	Route::get('childs/{id}/adDelete','ChildsController@adDelete');
});

//Tim kiem 
Route::get('search', function(){
	return view('search');
});