<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Albums;
use App\Http\Requests\AlbumsRequest;
use App\Categories;
class AlbumsController extends Controller {

	public function index()
	{
		//
	}
	public function getaddalbum()
	{
		$cate = Categories::select('cate_id','name')->get()->toArray();
		return view('albums.add',compact('cate'));
	}
	public function postaddalbum(AlbumsRequest $request)
	{
		$album = new Albums();
		$album->name = $request->tenalbum;
		$album->description = $request->mota;
		$album->parent_id = $request->txthoten;
		$album->cate_id = cate_parent($request->theloai);
		$album->save();
		return "Thêm album thành công";
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
}