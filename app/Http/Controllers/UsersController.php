<?php namespace App\Http\Controllers;
use App\User;
use App\Albums;
use App\Childs;

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
    function detail($id)
    {
        $albumCtr = new AlbumsController();
        $user = User::find($id);
        if(is_null($user))
        {
            warning("Không tồn tại nội dung bạn muốn xem!");
            return redirect()->action('HomeController@index');
        }
        $album = Albums::where('users_id', $id)->get()->toArray();
        if(count($album) > 0)
        {
            for($i = 0; $i < count($album); $i++)
            {
                $album[$i] = $albumCtr->getInfo($album[$i]['id']);
            }
        }
        $child = Childs::where('users_id', $id)->get()->toArray();
        for($i = 0; $i < count($child); $i++)
        {
            $childCtr = new ChildsController();
            $child[$i]["image"] = $childCtr->getImage($child[$i]['id']);
        }
        //debugArr($album);
        // debugArr($child);
        $data = ['user' => $user, 'album' => $album, 'child' => $child];
        return view('users.detail', ['data' => $data]);
    }

    public function postEdit(Request $request)
    {
        $allRequest = $request->all();
        $name = $allRequest['name'];
        $role = $allRequest['role'];
        $address = $allRequest['address'];
        $idcate = $allRequest['id'];
        $item = new User();
        $getuserById = $item->find($idcate);
        $getuserById->name = $name;
        $getuserById->role = $role;
        $getuserById->address= $address;
        $getuserById->save();
        success("Đã sửa thành công!");
        return redirect()->action('UsersController@edit');
    }

    public function myProfile()
    {
    	return $this->callAction('detail', ['id' => Auth::user()->id]);
    }
//ADMIN-----------------------------------------------------------------------------------
    public function adGetList()
    {
        $query = new User();
        $data = $query->all()->toArray();
        return view('admin.users.getlist')->with('data', $data);
    }
    public function adPostAdd(UsersRequest $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->role = $request->role;
        $item->address = $request->address;
        //$user->remember_token = $request->_token;
        $item->save();
        success("Đã thêm thành công!");
        return redirect()->action('UsersController@adGetList');
    }
    public function adEdit($id)
    {
        $item = new User();
        $getuserById = $item->find($id)->toArray();
        return view('admin.users.edit')->with('getuserById',$getuserById);
    }
    public function adPostEdit(Request $request)
    {
        $allRequest = $request->all();
        $name = $allRequest['name'];
        $role = $allRequest['role'];
        $address = $allRequest['address'];
        $idcate = $allRequest['id'];
        $item = new User();
        $getuserById = $item->find($idcate);
        $getuserById->name = $name;
        $getuserById->role = $role;
        $getuserById->address = $address;
        $getuserById->save();
        success("Đã sửa thành công!");
        return redirect()->action('UsersController@adGetList');
    }
    public function adDelete($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        success("Đã xóa thành công!");
        return redirect()->action('UsersController@adGetList');
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
