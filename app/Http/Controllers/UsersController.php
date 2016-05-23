<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
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
}
