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
        $album = Albums::where('users_id', $id)->orderBy('id','desc')->take(6)->get()->toArray();
        if(count($album) > 0)
        {
            for($i = 0; $i < count($album); $i++)
            {
                $album[$i] = $albumCtr->getInfo($album[$i]['id']);
            }
        }
        $child = Childs::where('users_id', $id)->orderBy('id','desc')->take(4)->get()->toArray();
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
       // $getuserById->role = $role;
        $getuserById->address= $address;
        $getuserById->save();
        success("Đã sửa thành công!");
        return redirect()->action('UsersController@edit');
    }

    public function myProfile()
    {
    	return $this->callAction('detail', ['id' => Auth::user()->id]);
    }

    function getListByNumber($skip, $take, $order = "id", $sort = "desc", $where = "name", $compare = "like", $value = "%%")
    {
        $data = User::skip($skip)->take($take)->orderBy($order, $sort)->get()->toArray();
        return $data;
    }
    function getListSortByAlbumLength($take)
    {
        $user = new User(); 
        $data = $user->select('users.id')->join('albums', 'users.id', '=', 'albums.users_id')->groupBy('id')->get()->toArray();
        for($i = 0; $i < count($data); $i++)
        {
            $data[$i] = User::find($data[$i]['id'])->toArray();
            $album = Albums::where('users_id', '=', $data[$i]['id'])->count();
            $data[$i]['albumlength'] = $album;
        }
        $data = collect($data);
        $data = $data->sortByDesc('albumlength')->take($take)->toArray();
        return $data;
    }
    function hot()
    {
        $data = $this->getListSortByAlbumLength(50);
        return view("users.hot", ['data' => $data]);
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
        $data = $this->getListByNumber($rowperpage * ($page - 1), $rowperpage, $order, $sort, $where, $compare, $value);
        $paging['all'] = ceil(count($data) / $rowperpage);
        $paging['page'] = $page;
        $paging['order'] = $order;
        $paging['sort'] = $sort;
        $paging['where'] = $where;
        $paging['compare'] = $compare;
        $paging['value'] = $value;
        // debugArr($data);
        return view('users.all', ['data' => $data, 'paging' => $paging]);
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
