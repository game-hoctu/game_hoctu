<?php

//AJAX------------------------------------------------------------------------------------------
Route::group(['prefix' => 'ajax'], function(){
	Route::group(['prefix' => 'images'], function(){
		Route::get('{albums_id}/getListByAlbums', 'ImagesController@ajaxGetListByAlbums');
		Route::get('getList', 'ImagesController@ajaxGetList');
	});

	Route::group(['prefix' => 'albums'], function(){
		Route::get('{cates_id}/getListByCates', 'AlbumsController@ajaxGetListByCates');
		Route::get('{users_id}/getListByUsers', 'AlbumsController@ajaxGetListByUsers');
		Route::get('{child_id}/getListByChilds', 'AlbumsController@ajaxGetListByChilds');
		Route::get('{child_id}/getListByNoChilds', 'AlbumsController@ajaxGetListByNoChilds');
		Route::get('getList', 'AlbumsController@ajaxGetList');
		//Route::get('search', 'AlbumsController@ajaxGetList');
	});

	Route::group(['prefix' => 'categories'], function(){
		Route::get('getList', 'CategoriesController@ajaxGetList');

	});

	Route::group(['prefix' => 'users'], function(){
		Route::get('getList', 'UsersController@ajaxGetList');

	});
	
	Route::group(['prefix' => 'childs'], function(){
		Route::get('{users_id}/getListByUser', 'ChildsController@ajaxGetListByUser');
		Route::get('{childs_id}/detail', 'ChildsController@ajaxDetail');
		Route::get('getList', 'ChildsController@ajaxGetList');
	});

	Route::group(['prefix' => 'results'], function(){
		Route::get('add/{childs_id}/{images_id}/{word}/{correct}/{incorrect}', 'ResultsController@ajaxAdd');
	});
});


Route::get('{any}', function(){
	return view('404error');
})->where('any', ".*");
?>