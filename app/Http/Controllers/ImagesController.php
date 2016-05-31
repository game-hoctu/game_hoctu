<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Images;
use App\Albums;
use Input;
use Illuminate\Http\Request;

class ImagesController extends Controller {
    public function edit($id)
    {
        $item = new Images();
        $getimageById = $item->find($id)->toArray();
        $albums = Albums::select('id','name')->get()->toArray();
        return view('images.edit', compact('albums', $albums))->with('getimageById',$getimageById);
    }
    public function postEdit(Request $request)
    {
        if(Input::hasFile('fImage'))
        {
            $img = $request->file('fImage');
        }
        $item = new Images();
        $allRequest = $request->all();
        $word = $allRequest['word'];
        $id = $allRequest['id'];

        $item = new Images();
        $getimageById = $item->find($id);
        $getimageById->word = $word;
        $getimageById->save();
        if(Input::hasFile('fImage'))
        {
            $des = 'public/upload/images';
            $img->move($des, $getimageById->url);
        }   
        success("Đã sửa thành công!");
        return redirect()->action('AlbumsController@detail', ['albums_id'=>$getimageById->albums_id]);
    }
    public function delete($id)
    {
        $item = Images::findOrFail($id);
        $item->delete();
        success("Đã xóa thành công!");
        return redirect()->action('AlbumsController@detail');
    }

//ADMIN----------------------------------------------------------------------------------------
    public function adGetList()
    {
        $albums = Albums::select('id','name')->get()->toArray();
        return view('admin.images.getlist', compact('albums', $albums));
    }
    public function adPostAdd(Request $request)
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
        return redirect()->action('ImagesController@adGetList');
    }
    public function adEdit($id)
    {
        $item = new Images();
        $getimageById = $item->find($id)->toArray();
        $albums = Albums::select('id','name')->get()->toArray();
        return view('admin.images.edit', compact('albums', $albums))->with('getimageById',$getimageById);
    }
    public function adPostEdit(Request $request)
    {

        if(Input::hasFile('fImage'))
        {
            $img = $request->file('fImage');
        }   
        $item = new Images();
        $allRequest = $request->all();
        $word = $allRequest['word'];
        $albums_id = $allRequest['albums_id'];
        $id = $allRequest['id'];

        $item = new Images();
        $getimageById = $item->find($id);
        $getimageById->word = $word;
        $getimageById->albums_id = $albums_id;
        $getimageById->save();

        if(Input::hasFile('fImage'))
        {
            $des = 'public/upload/images';
            $img->move($des, $getimageById->url);
        }  

        success("Đã sửa thành công!");
        return redirect()->action('ImagesController@adGetList');
    }
    public function adDelete($id)
    {
        $item = Images::findOrFail($id);
        $item->delete();
        success("Đã xóa thành công!");
        return redirect()->action('ImagesController@adGetList');
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
    function ajaxGetListByAlbums($albums_id){
        $data['status'] = 'ERROR';
        $images = new Images();
        $result = $images->where('albums_id', $albums_id)->get();
        if($result->count() > 0)
        {
            foreach ($result as $item) {
                $item['url'] = UPLOAD_FOLDER.$item['url'];
            }
            $data['status'] = 'SUCCESS';
            $data['info'] = $result;
        }
        return $data;
    }
}
