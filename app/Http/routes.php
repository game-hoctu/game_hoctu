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

//ADMIN----------------------------------------------------------------------------------
Route::get('admin', function(){
	if(Auth::guest())
	{
		warning(["Bạn cần phải đăng nhập để sử dụng chức năng này!"]);
		return view('auth.login');
	}
	elseif(Auth::user()->role < 3)
	{
		warning(["Bạn không có quyền sử dụng chức năng này!"]);
		return view('home');
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
			warning(["Bạn cần phải đăng nhập để sử dụng chức năng này!"]);
			return view('auth.login');
		}
		elseif(Auth::user()->role < 3)
		{
			warning(["Bạn không có quyền sử dụng chức năng này!"]);
			return view('home');
		}
		else
		{
			return view('admin.index');
		}
	});
//thêm, sửa, xóa trang thể loại
	Route::get('categories','CategoriesController@getlist');
	Route::get('categories/ad_add','CategoriesController@ad_add');
	Route::post('categories/ad_postadd',['as'=>'cate_postadd','uses'=>'CategoriesController@ad_postadd']);
	Route::get('categories/{id}/ad_edit','CategoriesController@ad_edit');
	Route::post('categories/{id}/ad_postedit',['as'=>'cate_postedit','uses'=>'CategoriesController@ad_postupdate']);
	Route::get('categories/{id}/ad_delete','CategoriesController@ad_delete');
//thêm, sửa, xóa trang albums
	Route::get('albums','AlbumsController@getlist');
	Route::get('albums/ad_add','AlbumsController@ad_add');
	Route::post('albums/ad_postadd',['as'=>'albums_postadd','uses'=>'AlbumsController@ad_postadd']);
	Route::get('albums/{id}/ad_edit','AlbumsController@ad_edit');
	Route::post('albums/{id}/ad_postedit',['as'=>'albums_postedit','uses'=>'AlbumsController@ad_postupdate']);
	Route::get('albums/{id}/ad_delete','AlbumsController@ad_delete');
//thêm, sửa, xóa trang images
	Route::get('images','ImagesController@getlist');
	Route::get('images/ad_add','ImagesController@ad_add');
	Route::post('images/ad_postadd',['as'=>'images_postadd','uses'=>'ImagesController@ad_postadd']);
	Route::get('images/{id}/ad_edit','ImagesController@ad_edit');
	Route::post('images/{id}/ad_postedit',['as'=>'images_postedit','uses'=>'ImagesController@ad_postupdate']);
	Route::get('images/{id}/ad_delete','ImagesController@ad_delete');
//thêm, sửa, xóa trang users
	Route::get('users','UsersController@getlist');
	Route::get('users/ad_add','UsersController@ad_add');
	Route::post('users/ad_postadd',['as'=>'users_postadd','uses'=>'UsersController@ad_postadd']);
	Route::get('users/{id}/ad_edit','UsersController@ad_edit');
	Route::post('users/{id}/ad_postedit',['as'=>'users_postedit','uses'=>'UsersController@ad_postupdate']);
	Route::get('users/{id}/ad_delete','UsersController@ad_delete');
});



//AJAX------------------------------------------------------------------------------------------
Route::group(['prefix' => 'ajax'], function(){
	Route::get('albums/list', function(){
		$data['status'] = 'ERROR';
		if(App\Albums::all()->count() > 0)
		{
			$data['status'] = 'SUCCESS';
			$data['info'] = App\Albums::all();
		}
		return $data;
	});
	Route::get('images/{albums_id}/list', function($albums_id){
		$data['status'] = 'ERROR';
		$images = new App\Images();
		$result = $images->where('albums_id', $albums_id)->get();
		if($result->count() > 0)
		{
			$data['status'] = 'SUCCESS';
			$data['info'] = $result;
		}
		return $data;
	});
	Route::get('categories/getList', 'CategoriesController@ajaxGetList');
	Route::get('users/getList', 'UsersController@ajaxGetList');
	Route::get('albums/categories/{cate_id}/list', 'AlbumsController@ajaxAlbumByCate');
	Route::get('albums/users/{users_id}/list', 'AlbumsController@ajaxAlbumByUsers');
	Route::get('albums/ajaxGetList', 'AlbumsController@ajaxGetList');
});