<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Images;
use App\Albums;
use Illuminate\Http\Request;

class ImagesController extends Controller {

	//Xem 1 image trong album
	/*public function getdetailimages($id_image)
	{
		$image = Images::where('id_image','=',$id_image)->first();
		$allAlbum = Albums::all();
		if(is_null($image))
		{
			return redirect::to('/');
		}
		else
		{
			return view('images.image')->with('image', $image)
										->with('allAlbum', $allAlbum);
		}
	}*/
	public function create(Request $request)
	{
		$image = new Images();
		$image->url = $request->txturl;
		$image->word = $request->txtword;
		$image->album_id = $request->cbbalbum;
		$image->save();
		return "Thêm hình ảnh thành công";
	}

	public function getlist()
	{
		$query = new Images();
		$data = $query->all()->toArray();
		return view('admin.images.getlist')->with('data', $data);
	}

}
