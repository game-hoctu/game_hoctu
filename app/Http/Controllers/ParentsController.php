<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Parents;
use App\Http\Requests\ParentsRequest;
class ParentsController extends Controller {
	public function register(ParentsRequest $request)
	{
		$parent = new Parents();
		$parent->email = $request->txtusername;
		$parent->password = md5($request->txtpassword);
		$parent->fullname = changeTitle($request->txtfullname);
		$parent->save();
		return redirect()->action('ParentsController@getlist');

	}
	public function getlist()
	{
		$parent = new Parents();
		$data = $parent->all()->toArray();
		return view('parents.getlist')->with('data', $data);
	}
    public function edit($id)
    {
        $parent = new Parents();
        $getParentById = $parent->find($id)->toArray();
        return view('parents.edit')->with('getParentById',$getParentById);
    }
    //cập nhật user theo id
    public function update(Request $request)
    {
        $allRequest = $request->all();
        $email = $allRequest['email'];
       // $password = $allRequest['password'];
        $fullname = $allRequest['fullname'];
        $idparent = $allRequest['id'];

        $parent = new Parents();
        $getParentById = $parent->find($idparent);
        $getParentById->email = $email;
       // $getParentById->password = $password;
        $getParentById->fullname = $fullname;
        $getParentById->save();

        return redirect()->action('ParentsController@getlist');

    }
    public function delete($id)
    {
        $parent = Parents::findOrFail($id);
        $parent->delete();
        return redirect()->action('ParentsController@getlist');
    }
}
