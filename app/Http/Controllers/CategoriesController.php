<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoriesRequests;

class CategoriesController extends Controller {

	public function all()
	{
		$cate = new Categories();
		$data = $cate->all()->toArray();
		for($i = 0; $i < count($data); $i++)
		{
			$data[$i]['albums'] = $cate->find($data[$i]['id'])->get()->toArray();
		}
		return view('categories.all')->with('data', $data);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
	}
	public function add()
	{
		return view('categories.add');
	}
	public function postAdd(Requests $request)
	{
		$cate = new Categories();
		$cate->name = $request->name;
		$cate->save();
		success("Đã thêm thành công!");
		return redirect()->action('CategoriesController@add');
	}
	public function edit($id)
	{
		$cate = new Categories();
		$getcateById = $cate->find($id)->toArray();
		return view('categories.edit')->with('getcateById',$getcateById);
	}
	public function postEdit(Request $request)
	{
		$allRequest = $request->all();
		$name = $allRequest['name'];
		$idcate = $allRequest['id'];
		$cate = new Categories();
		$getcateById = $cate->find($idcate);
		$getcateById->name = $name;
		$getcateById->save();
		success("Đã sửa thành công!");
		return redirect()->action('CategoriesController@edit');
	}
	public function delete($id)
	{
		$cate = Categories::findOrFail($id);
		$cate->delete();
		success("Đã xóa thành công!");
		return redirect()->action('CategoriesController@all');
	}
	//ADMIN-------------------------------------------------------------------------------
	public function adGetList()
	{
		$cate = new Categories();
		$data = $cate->all()->toArray();
		return view('admin.categories.getlist')->with('data', $data);
	}
	public function adPostAdd(Request $request)
	{
		$cate = new Categories();
		$cate->name = $request->name;
		$cate->save();
		success("Đã thêm thành công!");
		return redirect()->action('CategoriesController@adGetList');
	}
	public function adEdit($id)
	{
		$cate = new Categories();
		$getcateById = $cate->find($id)->toArray();
		return view('admin.categories.edit')->with('getcateById',$getcateById);
	}
	public function adPostEdit(Request $request)
	{
		$allRequest = $request->all();
		$name = $allRequest['name'];
		$idcate = $allRequest['id'];
		$cate = new Categories();
		$getcateById = $cate->find($idcate);
		$getcateById->name = $name;
		$getcateById->save();
		success("Đã sửa thành công!");
		return redirect()->action('CategoriesController@adGetList');
	}
	public function adDelete($id)
	{
		$cate = Categories::findOrFail($id);
		$cate->delete();
		success("Đã xóa thành công!");
		return redirect()->action('CategoriesController@adGetList');
	}


	//Ajax--------------------------------------------------
	function ajaxGetList()
	{
		$data['status'] = "ERROR";
        $result = Categories::all();
        if($result->count() > 0)
        {
            $data['status'] = "SUCCESS";
            $data['info'] = $result;
        }
        return $data;
	}
}
