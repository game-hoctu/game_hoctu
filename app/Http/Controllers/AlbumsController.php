<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Albums;
use App\Categories;
use App\Http\Requests\AlbumsRequest;

class AlbumsController extends Controller {

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function insert()
	{
		if(Auth::guest())
		{
			return view('auth.login', ['message' => warning('Bạn cần phải đăng nhập.')]);
		}
		else
		{
			$album = Categories::select('id','name')->get()->toArray();
			return view('albums.insert', compact('album'));
		}
		
	}
	public function postInsert(AlbumsRequest $request)
	{
		if(Auth::guest())
		{
			return view('auth.login', ['requestLogin' => 'true']);
		}
		else
		{
			$album = new Albums();
			$album->name = $request->name;
			$album->description = $request->description;
			$album->users_id = Auth::user()->id;
			$album->categories_id = $request->categories;
			$album->save();
			return route('insert');
		}
		
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

	public function myAlbum()
	{
		if(Auth::guest())
		{
			return view('auth.login', ['requestLogin' => 'true']);
		}
		else
		{
			$albums = new Albums(); 
			$user_id = Auth::user()->id;
			$result = $albums::where('id', $user_id)->get()->toArray();
			return view('albums.myAlbum', ['data' => $result]);
		}
	}

	public function getlist()
	{
		$query = new Albums();
		$data = $query->all()->toArray();
		return view('admin.albums.getlist')->with('data', $data);
	}

}
