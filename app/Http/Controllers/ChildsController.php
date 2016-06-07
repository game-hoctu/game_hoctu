<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Childs;
use App\User;
use Auth;
use File;
use App\Results;
use App\Images;
use Image;
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
		if(Input::hasFile('fImage'))
		{
			$img = $request->file('fImage');
		}	

		$img_name = date("dmYHis").stripUnicode($img->getClientOriginalName());
		
		$item = new Childs();
		$item->name = $request->name;
		$item->date_of_birth = $request->date_of_birth;
		$item->image  = $img_name;
		$item->sex = $request->sex;
		$item->users_id = Auth::user()->id;
		$item->save();
		if(Input::hasFile('fImage'))
		{
			$path = public_path('/upload/childs/' . $img_name);
			Image::make($img->getRealPath())->resize(350, 200)->save($path);
		}
		success("Đã thêm thành công!");
		return redirect()->action('ChildsController@myChild');
	}

	function edit($id)
	{
		$item = new Childs();
		$getchildById = $item->find($id)->toArray();
		$getchildById['image'] = $this->getImage($id);
		return view('childs.edit')->with('getchildById',$getchildById);
	}
	function postEdit(Request $request)
	{
		if(Input::hasFile('fImage'))
		{
			$img = $request->file('fImage');
		}		
		$allRequest = $request->all();
		$image = $allRequest['image'];
		$name = $allRequest['name'];
		$date_of_birth = $allRequest['date_of_birth'];
		$sex = $allRequest['sex'];
		$idchild = $allRequest['id'];
		$item = new Childs();
		$getchildById = $item->find($idchild);
		$getchildById->name = $name;
		$getchildById->date_of_birth = $date_of_birth;
		$getchildById->sex = $sex;
		$getchildById->save();

		if(Input::hasFile('fImage'))
		{
			$path = public_path('/upload/childs/' . $getchildById->image);
			Image::make($img->getRealPath())->resize(350, 200)->save($path);
		}

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

	function detail($id)
	{
		$child = Childs::find($id);
		if(is_null($child))
		{
			warning("Không tìm thấy nội dung bạn muốn xem!");
			return redirect()->action('HomeController@index');
		}
		$user = User::find($child->users_id);
		$child['image'] = $this->getImage($id);
		$results = Results::where('childs_id', $id)->orderBy('created_at','desc')->get()->toArray();
		$score = 0;
		for($i = 0; $i < count($results); $i++)
		{
			$results[$i]['url'] = Images::select('url')->where('id', $results[$i]['images_id'])->get()->first()->toArray()['url'];
			if(strlen($results[$i]['incorrect']) != 10)
			{
				$score += strlen($results[$i]['correct']);
			}
			
		}
		$data = ['child' => $child->toArray(), 'user' => $user->toArray(), 'results' => $results, 'score' => $score];
		// debugArr($data);
		return view('childs.detail', ['data' => $data]);
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
		if(!is_null($result))
		{
			
			for($i = 0; $i < count($result); $i++)
			{
				$result[$i]['image'] = $this->getImage($result[$i]['id']);
			}
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
		if(!is_null($result))
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
		$item->sex = $request->sex;
		$item->save();
		$des = 'public/upload/childs';
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
		if(Input::hasFile('fImage'))
		{
			$img = $request->file('fImage');
		}		
		$allRequest = $request->all();
		$name = $allRequest['name'];
		$date_of_birth = $allRequest['date_of_birth'];
		$user = $allRequest['users_id'];
		$sex = $allRequest['sex'];
		$idchild = $allRequest['id'];

		$item = new Childs();
		$getchildById = $item->find($idchild);
		$getchildById->name = $name;
		$getchildById->date_of_birth = $date_of_birth;
		$getchildById->sex = $sex;
		$getchildById->save();

		if(Input::hasFile('fImage'))
		{
			$des = 'public/upload/childs';
			$img->move($des, $getchildById->image);
		}

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
			$count = count($result);
			for($i = 0; $i < $count; $i++)
			{
				$result[$i]['image'] = $this->getImage($result[$i]['id']);
			}
			//debugArr($result);
			return view('childs.list', ['data' => $result]);
		}
	}

	function getImage($id)
	{
		$child = new Childs(); 
		$result = $child::find($id)->toArray();
		if($result['image'] == "")
		{
			return SERVER_PATH."public/images/no-image.png";
		}
		return CHILD_IMAGE.$result['image'];
	}
}
