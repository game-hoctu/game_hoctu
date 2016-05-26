<?php

//AJAX------------------------------------------------------------------------------------------
Route::group(['prefix' => 'ajax'], function(){
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
	Route::get('images/getList', 'ImagesController@ajaxGetList');


	Route::get('albums/categories/{cate_id}/list', 'AlbumsController@ajaxAlbumByCate');
	Route::get('albums/users/{users_id}/list', 'AlbumsController@ajaxAlbumByUsers');
	Route::get('albums/getList', 'AlbumsController@ajaxGetList');


	Route::get('childs/getListByUser/{users_id}', 'ChildsController@ajaxGetListByUser');
	Route::get('childs/getDetailt/{childs_id}', 'ChildsController@ajaxGetInfo');
	Route::get('childs/getList', 'ChildsController@ajaxGetList');

	Route::get('results/addResult/{childs_id}/{images_id}/{word}/{correct}/{incorrect}', 'ResultsController@ajaxAddResult');

});



Route::get('{any}', function(){
	return view('404error');
})->where('any', ".*");
?>