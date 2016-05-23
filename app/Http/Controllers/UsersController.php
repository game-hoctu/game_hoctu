<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UsersController extends Controller {
	public function edit($id)
	{
		$user = new User();
        $getUserById = $user->find($id)->toArray();
        return view('users.edit')->with('getUserById',$getUserById);
	}
	public function update(Request $request)
    {
        $allRequest = $request->all();
        $name = $allRequest['name'];
        //$email = $allRequest['email'];
        $iduser  = $allRequest['id'];
        $user = new User();

        $getUserById = $user->find($iduser);
        $getUserById->name = $name;
        //$getUserById->email = $email;
       // $getParentById->password = $password;
        $getUserById->save();
        return "Cập nhật thông tin thành công";

    }

    public function myProfile()
    {
    	if(Auth::guest())
		{
			return view('auth.login', ['message' => warning('Bạn cần phải đăng nhập.')]);
		}
		else
		{
			$id = Auth::user()->id;
			return $this->callAction("edit", ['id' => $id]);
		}
    }
    public function getlist()
    {
        $query = new User();
        $data = $query->all()->toArray();
        return view('admin.users.getlist')->with('data', $data);
    }
    public function ad_add()
    {
        return view('admin.users.add');
    }
    public function ad_postadd(Request $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->role = $request->role;
        //$user->remember_token = $request->_token;
        $item->save();
        return redirect()->action('UsersController@getlist');
    }
    public function ad_edit($id)
    {
        $item = new User();
        $getuserById = $item->find($id)->toArray();
        return view('admin.users.edit')->with('getuserById',$getuserById);
    }
    public function ad_postupdate(Request $request)
    {
        $allRequest = $request->all();
        $name = $allRequest['name'];
        $role = $allRequest['role'];
        $idcate = $allRequest['id'];
        $item = new User();
        $getuserById = $item->find($idcate);
        $getuserById->name = $name;
        $getuserById->role = $role;
        $getuserById->save();
        return redirect()->action('UsersController@getlist');
    }
    public function ad_delete($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        success("Đã xóa thành công!");
        return redirect()->action('UsersController@getlist');
    }
}
