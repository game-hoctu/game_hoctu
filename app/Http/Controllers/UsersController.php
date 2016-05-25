<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller {
	public function edit($id)
    {
        if(Auth::guest())
        {
            return view('auth.login', ['message' => warning('Bạn cần phải đăng nhập.')]);
        }
        elseif(Auth::user()->id != $id)
        {
            $item = new User();
            $getuserById = $item->find(Auth::user()->id)->toArray();
        }
        else
        {
            $item = new User();
            $getuserById = $item->find($id)->toArray();
        }
        return view('users.edit')->with('getuserById', $getuserById);

    }
    public function postEdit(Request $request)
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
        success("Đã sửa thành công!");
        return redirect()->action('UsersController@edit');
    }

    public function myProfile()
    {
    	return $this->callAction('edit', ['id' => Auth::user()->id]);
    }
//ADMIN-----------------------------------------------------------------------------------
    public function getlist()
    {
        $query = new User();
        $data = $query->all()->toArray();
        return view('admin.users.getlist')->with('data', $data);
    }
    public function ad_postadd(UsersRequest $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->role = $request->role;
        //$user->remember_token = $request->_token;
        $item->save();
        success("Đã thêm thành công!");
        return redirect()->action('UsersController@getlist');
    }
    public function ad_edit($id)
    {
        $item = new User();
        $getuserById = $item->find($id)->toArray();
        return view('admin.users.edit')->with('getuserById',$getuserById);
    }
    public function ad_postEdit(Request $request)
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
        success("Đã sửa thành công!");
        return redirect()->action('UsersController@getlist');
    }
    public function ad_delete($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        success("Đã xóa thành công!");
        return redirect()->action('UsersController@getlist');
    }


    //Ajax----------------------------------------------------
    function ajaxGetList()
    {
        $data['status'] = "ERROR";
        $result = User::all();
        if($result->count() > 0)
        {
            $data['status'] = "SUCCESS";
            $data['info'] = $result;
        }
        return $data;
    }
}
