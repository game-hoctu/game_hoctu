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
	function ajaxDetail($childs_id)
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
	public function adGetList()
	{
		$users = User::all()->toArray();
		return view('admin.childs.getList', compact('users'));
	}
	public function adPostAdd(Request $request)
	{
		$item = new Childs();
		$item->name = $request->name;
		$item->users_id = $request->users_id;
		$item->save();
		success("Đã thêm thành công!");
		return redirect()->action('ChildsController@adGetList');
	}
	public function adEdit($id)
	{
		$users = User::all()->toArray();
		$item = new Childs();
		$getchildById = $item->find($id)->toArray();
		return view('admin.childs.edit', compact('users', 'cates'))->with('getchildById',$getchildById);
	}
	public function adPostEdit(Request $request)
	{
		$allRequest = $request->all();
		$name = $allRequest['name'];
		$user = $allRequest['users_id'];
		$idalbum = $allRequest['id'];
		$item = new Childs();
		$getchildById = $item->find($idalbum);
		$getchildById->name = $name;
		$getchildById->users_id = $user;
		$getchildById->save();
		success("Đã sửa thành công!");
		return redirect()->action('ChildsController@adGetList');
	}
	public function adDelete($id)
	{
		$item = Childs::findOrFail($id);
		$item->delete();
		success("Đã xóa thành công!");
		return redirect()->action('ChildsController@adGetList');
	}
}
