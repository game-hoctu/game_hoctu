<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use Illuminate\Http\Request;
//use App\Http\Requests\Request;

class CategoriesController extends Controller {

	public function getlistcate()
	{
		$cate = new Categories();
		$data = $cate->all()->toArray();
		return view('cate.getlist')->with('data', $data);
	}
	public function getAdd()
	{
		return view('cate.add');
	}
	public function postAdd(Request $request)
	{
		$cate = new Categories();
		$cate->name = $request->name;
		$cate->save();
		return "Thêm Thể loại thành công";
	}
}
