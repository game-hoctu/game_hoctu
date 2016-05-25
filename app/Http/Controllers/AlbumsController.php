<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Albums;
use App\Categories;
use App\Http\Requests\AlbumsRequest;

class AlbumsController extends Controller {

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function insert()
	{
		if(Auth::guest())
		{
			return view('auth.login', ['message' => warning('Bạn cần phải đăng nhập.')]);
		}
		else
		{
			$album = Categories::select('id','name')->get()->toArray();
			return view('albums.insert', compact('album'));
		}
		
	}
	public function postInsert(AlbumsRequest $request)
	{
		if(Auth::guest())
		{
			return view('auth.login', ['requestLogin' => 'true']);
		}
		else
		{
			$album = new Albums();
			$album->name = $request->name;
			$album->description = $request->description;
			$album->users_id = Auth::user()->id;
			$album->categories_id = $request->categories;
			$album->save();
			return route('insert');
		}
		
	}

	public function myAlbum()
	{
		if(Auth::guest())
		{
			return view('auth.login', ['requestLogin' => 'true']);
		}
		else
		{
			$albums = new Albums(); 
			$user_id = Auth::user()->id;
			$result = $albums::where('id', $user_id)->get()->toArray();
			return view('albums.myAlbum', ['data' => $result]);
		}
	}

	public function getList()
	{
		$users = User::all()->toArray();
		$cates = Categories::all()->toArray();
		return view('admin.albums.getlist', compact('users', 'cates'));
	}
	public function ad_postAdd(Request $request)
	{
		$item = new Albums();
		$item->name = $request->name;
		$item->description = $request->description;
		$item->users_id = $request->users_id;
		$item->categories_id = $request->categories_id;
		$item->save();
		success("Đã thêm thành công!");
		return redirect()->action('AlbumsController@getlist');
	}
	public function ad_edit($id)
	{
		$users = User::all()->toArray();
		$cates = Categories::all()->toArray();
		$item = new Albums();
		$getalbumById = $item->find($id)->toArray();
		return view('admin.albums.edit', compact('users', 'cates'))->with('getalbumById',$getalbumById);
	}
	public function ad_postEdit(Request $request)
	{
		$allRequest = $request->all();
		$name = $allRequest['name'];
		$mota = $allRequest['description'];
		$user = $allRequest['users_id'];
		$theloai = $allRequest['categories_id'];
		$idalbum = $allRequest['id'];
		$item = new Albums();
		$getalbumById = $item->find($idalbum);
		$getalbumById->name = $name;
		$getalbumById->description = $mota;
		$getalbumById->users_id = $user;
		$getalbumById->categories_id = $theloai;
		$getalbumById->save();
		success("Đã sửa thành công!");
		return redirect()->action('AlbumsController@getlist');
	}
	public function ad_delete($id)
	{
		$item = Albums::findOrFail($id);
		$item->delete();
		success("Đã xóa thành công!");
		return redirect()->action('AlbumsController@getlist');
	}

	//Ajax------------------------------------------------------
	public function ajaxAlbumByCate($cate_id)
	{
		$data['status'] = 'ERROR';
		$albums = Albums::where('categories_id', $cate_id)->get();
		if($albums->count() > 0)
		{
			$data['status'] = 'SUCCESS';
			$data['info'] = $albums;
		}
		return $data;
	}

	public function ajaxAlbumByUsers($users_id)
	{
		$data['status'] = 'ERROR';
		$albums = Albums::where('users_id', $users_id)->get();
		if($albums->count() > 0)
		{
			$data['status'] = 'SUCCESS';
			$data['info'] = $albums;
		}
		return $data;
	}

	function ajaxGetList()
	{
		$data['status'] = 'ERROR';
		$albums = Albums::all();
		if($albums->count() > 0)
		{
			$data['status'] = 'SUCCESS';
			$data['info'] = $albums;
		}
		return $data;
	}
}
