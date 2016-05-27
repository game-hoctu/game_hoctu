<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Childs;
use App\User;
use Auth;
class ChildsController extends Controller {

	function add()
	{
		if(Auth::guest())
		{
			return view('auth.login', ['message' => warning('Bạn cần phải đăng nhập.')]);
		}
		else
		{
			return view('childs.add');
		}
	}
	function postAdd(Request $request)
	{
		$item = new Childs();
		$item->name = $request->name;
		$item->users_id = Auth::user()->id;
		$item->save();
		success("Đã thêm thành công!");
		return redirect()->action('ChildsController@myChild');
	}

	function edit($id)
	{
		$item = new Childs();
		$getchildById = $item->find($id)->toArray();
		return view('childs.edit')->with('getchildById',$getchildById);
	}
	function postEdit(Request $request)
	{
		$allRequest = $request->all();
		$name = $allRequest['name'];
		//$user = $allRequest['users_id'];
		$idchild = $allRequest['id'];
		$item = new Childs();
		$getchildById = $item->find($idchild);
		$getchildById->name = $name;
		$getchildById->save();
		success("Đã sửa thành công!");
		return redirect()->action('ChildsController@myChild');
	}
	function delete($id)
	{
		$item = Childs::findOrFail($id);
		$item->delete();
		success("Đã xóa thành công!");
		return redirect()->action('ChildsController@myChild');
	}
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
	//Người dùng bình thường
	public function myChild()
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

	function getListByUser($user_id)
	{
		if(Auth::guest())
		{
			warning("Bạn cần phải đăng nhập!");
			return view('auth.login');
		}
		else
		{
			$child = new Childs(); 
			$result = $child::where('users_id', $user_id)->orderBy('id','desc')->get()->toArray();
			return view('childs.list', ['data' => $result]);
		}
	}
}
