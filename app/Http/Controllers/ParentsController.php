<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
<<<<<<< HEAD

class ParentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

=======
use App\Parents;
use App\Http\Requests\ParentsRequest;
class ParentsController extends Controller {
	public function register(ParentsRequest $request)
	{
		$parent = new Parents();
		$parent->email = $request->txtusername;
		$parent->password = md5($request->txtpassword);
		$parent->fullname = $request->txtfullname;
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
>>>>>>> 85cd8f0270abc8f37ac35760fa50f907ae578e95
}
