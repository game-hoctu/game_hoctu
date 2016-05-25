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
	public function getList()
	{
		$albums = Albums::select('id','name')->get()->toArray();
        return view('admin.images.getlist', compact('albums', $albums));
	}
    public function ad_postAdd(Request $request)
    {
        $img = $request->file('fImage');
        $img_name = date("dmYHis").stripUnicode($img->getClientOriginalName());
        $item = new Images();
        $item->url  = $img_name;
        $item->word = $request->word;
        $item->albums_id = $request->albums_id;
        $item->save();
        $des = 'public/upload/images';
        $img->move($des, $img_name);
        success("Đã thêm thành công!");
        return redirect()->action('ImagesController@getList');
    }
    public function ad_edit($id)
    {
        $item = new Images();
        $getimageById = $item->find($id)->toArray();
        $albums = Albums::select('id','name')->get()->toArray();
        return view('admin.images.edit', compact('albums', $albums))->with('getimageById',$getimageById);
    }
    public function ad_postEdit(Request $request)
    {
        $img = $request->file('fImage');
        $item = new Images();
        $allRequest = $request->all();
        $url = $allRequest['url'];
        $word = $allRequest['word'];
        $albums_id = $allRequest['albums_id'];
        $id = $allRequest['id'];

        $item = new Images();
        $getimageById = $item->find($id);
        $getimageById->word = $word;
        $getimageById->albums_id = $albums_id;
        $getimageById->save();

        $img_name = $url;
        $des = 'public/upload/images';
        $img->move($des, $img_name);
        success("Đã sửa thành công!");
        return redirect()->action('ImagesController@getList');
    }
    public function ad_delete($id)
    {
        $item = Images::findOrFail($id);
        $item->delete();
        success("Đã xóa thành công!");
        return redirect()->action('ImagesController@getList');
    }


    //AJAX--------------------------------------------------------------------------------------------

    function ajaxGetList()
    {
        $data['status'] = 'ERROR';
        $result = Images::all();
        if($result->count() > 0)
        {
            $data['status'] = 'SUCCESS';
            $data['info'] = $result;
        }
        return $data;
    }

}
