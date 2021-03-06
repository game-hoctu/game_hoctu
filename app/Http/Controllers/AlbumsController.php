<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Albums;
use App\Images;
use App\Categories;
use App\Http\Requests\AlbumsRequest;
use File;
use Image;
use Input;
use App\Childs;
use DB;
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
	public function add()
	{
		if(Auth::guest())
		{
			return view('auth.login', ['message' => warning('Bạn cần phải đăng nhập.')]);
		}
		else
		{
			$album = Categories::select('id','name')->get()->toArray();
			//$users = User::select('id','name')->get()->toArray();
			$cates = Categories::select('id','name')->get()->toArray();
			return view('albums.add', compact('album','cates'));
		}
		
	}
	public function postAdd(AlbumsRequest $request)
	{
		if(Auth::guest())
		{
			warning("Bạn cần phải đăng nhập!");
			return view('auth.login');
		}
		else
		{
			$words = Input::all()['words'];
			$album = new Albums();
			$album->name = $request->name;
			$album->description = $request->description;
			$album->users_id = Auth::user()->id;
			$album->categories_id = $request->categories_id;
			$album->save();
			$albums_id = $album->id;
			if(Input::hasFile('fImage'))
			{
				$i = 0;
				foreach(Input::file('fImage') as $img) {
					$img_name = date("dmYHis").stripUnicode($img->getClientOriginalName());
					$arrName = explode(".", $img_name);
					$arrName[count($arrName)-1] = "jpg";
					$img_name = implode(".", $arrName);
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
			success("Đã thêm thành công!");
			return redirect()->action('AlbumsController@myAlbum');
		}
		
	}
	function edit($id)
	{
		//$users = User::all()->toArray();
		$cates = Categories::all()->toArray();
		$item = new Albums();
		$getalbumById = $item->find($id)->toArray();
		return view('albums.edit', compact('cates'))->with('getalbumById',$getalbumById);
	}
	function postEdit(Request $request)
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
		//$getalbumById->users_id = $user;
		$getalbumById->categories_id = $theloai;
		$getalbumById->save();
		success("Đã sửa thành công!");
		return redirect()->action('AlbumsController@myAlbum');
	}

	function delete($id)
	{
		$item = Albums::findOrFail($id);
		$images = Images::where('albums_id', $id)->get()->toArray();
		File::delete('public/upload/albums/'.$item->id.".jpg");
		foreach($images as $img)
		{
			File::delete('public/upload/images/'.$img['url']);
		}
		$item->delete();
		success("Đã xóa thành công!");
		return redirect()->action('AlbumsController@myAlbum');
	}

	function getListByUser($user_id)
	{
		if(Auth::guest())
		{
			warning("Bạn cần phải đăng nhập!");
			return view('auth.login');
		}
		else
		{
			$user = User::find($user_id)->toArray();
			$albums = new Albums(); 
			$result = $albums::where('users_id', $user_id)->orderBy('id','desc')->get()->toArray();
			for($i = 0; $i < count($result); $i++)
			{
				// $urlAlbumImage = ALBUM_IMAGE.$result[$i]['id'].".jpg";
				// if(!File::exists($urlAlbumImage))
				// {
				// 	$image = Images::where('albums_id', $result[$i]['id'])->get()->toArray();
				// 	$numImage = count($image);
				// 	if($numImage > 0)
				// 	{
				// 		$imageName = UPLOAD_FOLDER.$image[0]['url'];
				// 		$path = public_path("/upload/albums/".$result[$i]['id'].".jpg");
				// 		Image::make($imageName)->resize(700, 400)->save($path);
				// 	}
				// 	else
				// 	{
				// 		$urlAlbumImage = SERVER_PATH."/public/images/no-image.png";
				// 	}
				// }
				$data = $this->autoloadImage($result[$i]['id']);
				$result[$i]['image'] = $data['image'];
				$result[$i]['count'] = $data['count'];
			}
			return view('albums.list', ['data' => $result, 'user' => $user]);
		}
	}

	function autoloadImage($id)
	{
		$albums = new Albums(); 
		$result = $albums::find($id)->toArray();
		$urlAlbumImage = ALBUM_IMAGE.$result['id'].".jpg";
		if(!File::exists($urlAlbumImage))
		{
			$image = Images::where('albums_id', $result['id'])->get()->toArray();
			$numImage = count($image);
			if($numImage > 0)
			{
				$imageName = UPLOAD_FOLDER.$image[0]['url'];
				$path = public_path("/upload/albums/".$result['id'].".jpg");
				Image::make($imageName)->resize(350, 200)->save($path);
			}
			else
			{
				$urlAlbumImage = SERVER_PATH."/public/images/no-image.png";
			}
		}
		$data = ['image' => $urlAlbumImage, 'count' => $numImage];
		return $data;
	}

	public function myAlbum()
	{
		if(Auth::guest())
		{
			warning("Bạn cần phải đăng nhập!");
			return view('auth.login');
		}
		else
		{
			return $this->callAction('getListByUser', ['user_id' => Auth::user()->id]);
		}
	}

	function detail($albums_id)
	{
		$data = $this->getInfo($albums_id);
		//debugArr($data);
		return view('albums.detail',['data'=>$data]);
	}

	function getInfo($albums_id)
	{
		$model = new Albums();
		$data = $model->find($albums_id)->toArray();
		//Lấy thông tin categories của album
		$data['categories'] = Categories::where('id', $data['categories_id'])->get()->first()->toArray();
		$data['users'] = User::where('id', $data['users_id'])->get()->first()->toArray();
		//Lấy danh sách các image trong album
		$data['images'] = Images::where('albums_id', $albums_id)->get()->toArray();
		$result = $this->autoloadImage($albums_id);
		$data['image'] = $result['image'];
		$data['count'] = $result['count'];
		return $data;
	}

	function search($key)
	{
		$albums = new Albums(); 
		$result = $albums::where('name', 'like', "%$key%")->orWhere('id','$key')->get()->toArray();
		for($i = 0; $i < count($result); $i++)
		{
			$data = $this->autoloadImage($result[$i]['id']);
			$result[$i]['image'] = $data['image'];
			$result[$i]['count'] = $data['count'];
		}
		return $result;
	}

	function getListByNumber($skip, $take, $order = "id", $sort = "desc", $where = "name", $compare = "like", $value = "%%")
	{
		$result = Albums::where($where, $compare, $value)->skip($skip)->take($take)->orderBy($order, $sort)->get()->toArray();
		for($i = 0; $i < count($result); $i++)
		{
			$data = $this->autoloadImage($result[$i]['id']);
			$result[$i]['image'] = $data['image'];
			$result[$i]['count'] = $data['count'];
			$result[$i]['users'] = User::find($result[$i]['users_id']);
			$result[$i]['categories'] = Categories::find($result[$i]['categories_id']);
		}
		return $result;
	}

	function all(Request $request)
	{
		$rowperpage = 12;
		if(!is_null($request->page))
		{
			$page = $request->page;
		}
		else
		{
			$page = 1;
		}
		if(!is_null($request->order) && $request->order != "")
		{
			$order = $request->order;
		}
		else
		{
			$order = "id";
		}
		if(!is_null($request->sort) && $request->sort != "")
		{
			$sort = $request->sort;
		}
		else
		{
			$sort = "desc";
		}
		if(!is_null($request->where) && $request->where != "")
		{
			$where = $request->where;
		}
		else
		{
			$where = "name";
		}
		if(!is_null($request->compare) && $request->compare != "")
		{
			$compare = $request->compare;
		}
		else
		{
			$compare = "like";
		}
		if(!is_null($request->value) && $request->value != "")
		{
			$value = $request->value;
		}
		else
		{
			$value = "%%";
		}
		$all = Albums::where($where, $compare, $value)->orderBy($order, $sort)->get()->toArray();
		$pageall = ceil(count($all) / $rowperpage);
		$page = ($page > $pageall) ? $pageall : $page;
		$data = $this->getListByNumber($rowperpage * ($page - 1), $rowperpage, $order, $sort, $where, $compare, $value);
		$paging['all'] = ceil(count($all) / $rowperpage);
		$paging['page'] = $page;
		$paging['order'] = $order;
		$paging['sort'] = $sort;
		$paging['where'] = $where;
		$paging['compare'] = $compare;
		$paging['value'] = $value;
		// debugArr($data);
		return view('albums.all', ['data' => $data, 'paging' => $paging]);
	}
	//ADMIN---------------------------------------------------
	public function adGetList()
	{
		$users = User::all()->toArray();
		$cates = Categories::all()->toArray();
		return view('admin.albums.getlist', compact('users', 'cates'));
	}
	public function adPostAdd(Request $request)
	{
		$item = new Albums();
		$item->name = $request->name;
		$item->description = $request->description;
		$item->users_id = $request->users_id;
		$item->categories_id = $request->categories_id;
		$item->save();
		success("Đã thêm thành công!");
		return redirect()->action('AlbumsController@adGetList');
	}
	public function adEdit($id)
	{
		$users = User::all()->toArray();
		$cates = Categories::all()->toArray();
		$item = new Albums();
		$getalbumById = $item->find($id)->toArray();
		return view('admin.albums.edit', compact('users', 'cates'))->with('getalbumById',$getalbumById);
	}
	public function adPostEdit(Request $request)
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
		return redirect()->action('AlbumsController@adGetList');
	}
	public function adDelete($id)
	{
		$item = Albums::findOrFail($id);
		$item->delete();
		success("Đã xóa thành công!");
		return redirect()->action('AlbumsController@adGetList');
	}

	//Ajax------------------------------------------------------
	public function ajaxGetListByCates($cates_id)
	{
		$data['status'] = 'ERROR';
		$albums = Albums::where('categories_id', $cates_id)->orderBy('id','desc')->get();
		if($albums->count() > 0)
		{
			$data['status'] = 'SUCCESS';
			$data['info'] = $albums;
		}
		return $data;
	}

	public function ajaxGetListByUsers($users_id)
	{
		$data['status'] = 'ERROR';
		$albums = Albums::where('users_id', $users_id)->orderBy('id','desc')->get();
		$albumCount = $albums->count();
		if($albumCount > 0)
		{
			$data['status'] = 'SUCCESS';
			$data['info'] = $albums;
		}
		return $data;
	}
	public function ajaxGetListByChilds($child_id)
	{
		$data['status'] = 'ERROR';
		$child = Childs::find($child_id);
		if(!is_null($child))
		{
			$albums = Albums::where('users_id', $child->users_id)->orderBy('id','desc')->get();
			$albumCount = $albums->count();
			if($albumCount > 0)
			{
				for($i = 0; $i < $albumCount; $i++)
				{
					$image = Images::where('albums_id', $albums[$i]['id'])->get();
					$albums[$i]['count'] = $image->count();
					$albums[$i]['image'] = ALBUM_IMAGE.$albums[$i]['id'].".jpg";
				}
				$data['status'] = 'SUCCESS';
				$data['info'] = $albums;
			}
		}
		return $data;
	}

	public function ajaxGetListByNoChilds($child_id)
	{
		$data['status'] = 'ERROR';
		$child = Childs::find($child_id);
		if(!is_null($child))
		{
			$albums = Albums::where('users_id', '!=', $child->users_id)->orderBy('id','desc')->get();
			$albumCount = $albums->count();
			if($albumCount > 0)
			{
				for($i = 0; $i < $albumCount; $i++)
				{
					$image = Images::where('albums_id', $albums[$i]['id'])->get();
					$albums[$i]['count'] = $image->count();
					$albums[$i]['image'] = ALBUM_IMAGE.$albums[$i]['id'].".jpg";
				}
				$data['status'] = 'SUCCESS';
				$data['info'] = $albums;
			}
		}
		return $data;
	}

	function ajaxGetList()
	{
		$data['status'] = 'ERROR';
		$albums = Albums::all();
		$albumCount = $albums->count();
		if($albumCount > 0)
		{
			for($i = 0; $i < $albumCount; $i++)
			{
				$image = Images::where('albums_id', $albums[$i]['id'])->orderBy('created_at', 'desc')->get();
				$albums[$i]['count'] = $image->count();
				$albums[$i]['image'] = ALBUM_IMAGE.$albums[$i]['id'].".jpg";
			}
			$data['status'] = 'SUCCESS';
			$data['info'] = $albums;
		}
		return $data;
	}

	function ajaxDetail($albums_id)
	{
		$data['status'] = 'ERROR';
		$albums = Albums::find($albums_id);
		$albums->downloads += 1;
		$albums->save();
		if(!is_null($albums))
		{
			$albums = $albums->toArray();
			$albums['image'] = ALBUM_IMAGE.$albums['id'].".jpg";
			$data['status'] = 'SUCCESS';
			$data['info'] = $albums;
		}
		//debugArr($albums);
		return $data;
	}
}
