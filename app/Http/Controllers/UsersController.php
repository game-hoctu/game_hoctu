<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller {
	public function edit($id)
	{
		$u = new User();
        $getUserById = $u->find($id)->toArray();
        return view('users.edit')->with('getUserById',$getUserById);
	}
	public function update(Request $request)
    {
        $allRequest = $request->all();
        $name = $allRequest['name'];
        $email = $allRequest['email'];
        $iduser  = $allRequest['id'];

        $user = new Parents();
        $getUserById = $u->find($iduser);
        $getUserById->name = $name;
        $getUserById->email = $email;
       // $getParentById->password = $password;
        $getUserById->save();
        return "Cập nhật thông tin thành công";

    }
}
