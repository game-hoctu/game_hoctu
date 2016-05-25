<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Childs;
use App\User;
class ChildsController extends Controller {

	//
	//AJAX------------------------------------------------------------------------------
	//Lấy danh sách child theo user id
	function ajaxGetListByUser($users_id)
	{
		$data['status'] = "ERROR";
		$result = Childs::where('users_id', $users_id)->get();
		if($result->count() > 0)
		{
			$data['status'] = "SUCCESS";
			$data['info'] = $result;
		}
		return $data;
	}

	function ajaxGetList()
	{
		$data['status'] = "ERROR";
		$result = Childs::all();
		if($result->count() > 0)
		{
			$data['status'] = "SUCCESS";
			$data['info'] = $result;
		}
		return $data;
	}

	//Lấy thông tin chi tiết của child
	function ajaxGetInfo($childs_id)
	{
		$data['status'] = "ERROR";
		$result = Childs::find($childs_id);
		if($result->count() > 0)
		{
			$data['status'] = "SUCCESS";
			$data['info'] = $result;
		}
		return $data;
	}
//ADMIN---------------------------------------------------------------------
	public function getList()
	{
		$users = User::all()->toArray();
		return view('admin.childs.getlist', compact('users'));
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
		return redirect()->action('AlbumsController@getList');
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
		return redirect()->action('AlbumsController@getList');
	}
	public function ad_delete($id)
	{
		$item = Albums::findOrFail($id);
		$item->delete();
		success("Đã xóa thành công!");
		return redirect()->action('AlbumsController@getList');
	}
}
