<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Images;
use App\Albums;
use App\Categories;
use Input;
use File;
use Storage;
use Image;
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
            // $des = 'public/upload/images';
            // $img->move($des, $getimageById->url);
            $path = public_path('/upload/images/' . $getimageById->url);
            Image::make($img->getRealPath())->resize(699, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
        }   
        success("Đã sửa thành công!");
        return redirect()->action('AlbumsController@detail', ['albums_id'=>$getimageById->albums_id]);
    }
    public function delete($id)
    {
        $item = Images::findOrFail($id);
        //Storage::delete('public/upload/images/'.$item->url);
        File::delete('public/upload/images/'.$item->url);
        $item->delete();
        success("Đã xóa thành công!");
        return redirect()->action('AlbumsController@detail', [$item->albums_id]);
    }

    function addByAlbums($albums_id)
    {
        $albums = Albums::find($albums_id);
        $albums['cates'] = Categories::find($albums['categories_id']);
        return view('images.addbyalbums', ['albums' => $albums->toArray()]);
    }
    function postAddByAlbums(Request $request)
    {
        $words = Input::all()['words'];
        $albums_id = $request->albums_id;
        if(Input::hasFile('fImage'))
        {
            $i = 0;
            foreach(Input::file('fImage') as $img) {
                $img_name = date("dmYHis").stripUnicode($img->getClientOriginalName());
                $path = public_path('/upload/images/' . $img_name);
                Image::make($img->getRealPath())->resize(699, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path);
                $item = new Images();
                $item->url  = $img_name;
                $item->word = strtoupper($words[$i]);
                $item->albums_id = $albums_id;
                $item->save();
                if($i == 0)
                {
                    $imageName = UPLOAD_FOLDER.$img_name;
                    $path = public_path("/upload/albums/".$albums_id.".jpg");
                    Image::make($imageName)->resize(350, 200)->save($path);
                }
                $i++;
            }
        }
        success("Đã cập nhật thành công!");
        return redirect()->action('AlbumsController@detail', [$albums_id]);
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
        $path = public_path('/upload/images/' . $img_name);
        Image::make($img->getRealPath())->resize(699, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        success("Đã thêm thành công!");
        $item->save();
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
            $path = public_path('/upload/images/' . $getimageById->url);
            Image::make($img->getRealPath())->resize(699, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
            // $des = 'public/upload/images';
            // $img->move($des, $getimageById->url);
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
