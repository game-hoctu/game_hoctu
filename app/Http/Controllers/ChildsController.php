<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Childs;
use App\User;
use Auth;
use Input;
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
		$img = $request->file('fImage');
        $img_name = date("dmYHis").stripUnicode($img->getClientOriginalName());
		
		$item = new Childs();
		$item->name = $request->name;
		$item->date_of_birth = $request->date_of_birth;
		$item->image  = $img_name;
		$item->users_id = Auth::user()->id;
		$item->save();

		$des = 'public/upload/images';
        $img->move($des, $img_name);
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

		$img = $request->file('fImage');  		
		$allRequest = $request->all();
		$image = $allRequest['image'];
		$name = $allRequest['name'];
		$date_of_birth = $allRequest['date_of_birth'];
		//$user = $allRequest['users_id'];
		$idchild = $allRequest['id'];
		$item = new Childs();
		$getchildById = $item->find($idchild);
		$getchildById->name = $name;
		$getchildById->date_of_birth = $date_of_birth;
		$getchildById->save();

		$img_name = $image;
        $des = 'public/upload/images';
        $img->move($des, $img_name);

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
		$img = $request->file('fImage');
        $img_name = date("dmYHis").stripUnicode($img->getClientOriginalName());
		$item = new Childs();
		$item->name = $request->name;
		$item->users_id = $request->users_id;
		$item->date_of_birth = $request->date_of_birth;
		$item->image  = $img_name;
		$item->save();
		$des = 'public/upload/images';
        $img->move($des, $img_name);
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

		$img = $request->file('fImage');  
		$allRequest = $request->all();
		$image = $allRequest['image'];
		$name = $allRequest['name'];
		$user = $allRequest['users_id'];
		$idchild = $allRequest['id'];

		$item = new Childs();
		$getchildById = $item->find($idchild);
		$getchildById->name = $name;
		$getchildById->save();

		$img_name = $image;
        $des = 'public/upload/images';
        $img->move($des, $img_name);

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
