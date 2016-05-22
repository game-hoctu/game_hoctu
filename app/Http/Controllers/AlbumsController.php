<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Albums;
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
	public function create(AlbumsRequest $request)
	{
		$album = new Albums();
		$album->name = $request->txttenalbum;
		$album->description = $request->txtmota;
		$album->user_id = $request->txthoten;
		$album->cate_id = $request->txttheloai;
		$album->save();
		return "Tạo Albums thành công";
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

}
