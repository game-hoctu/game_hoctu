<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Albums;
use App\Childs;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$albumCtrl = new AlbumsController();
		$albums_hot = $albumCtrl->getListByNumber(0, 6, "downloads");
		$albums = $albumCtrl->getListByNumber(0, 6);
		$childsCtrl = new ChildsController();
		$childs = $childsCtrl->getListByNumber(0, 6, "id", "desc");
		$childs_hot = $childsCtrl->getListSortByScore(6);
		$userCtrl = new UsersController();
		$users = $userCtrl->getListByNumber(0, 6, "id", "desc");
		$users_hot = $userCtrl->getListSortByAlbumLength(6);
		// debugArr($childs_hot);
		// $childsCtrl = new ChildsController();

		// debugArr($childsCtrl->getListSortByScore());
		// debugArr($albums_hot);
		return view('home', ['albums' => $albums, 'albums_hot' => $albums_hot, 'childs' => $childs, 'childs_hot' => $childs_hot, 'users' => $users, 'users_hot' => $users_hot]);
	}

	public function search(Request $request)
	{
		$key = $request->key;
		$users = User::where('name', 'like', "%$key%")->orWhere('id','$key')->get()->toArray();
		$albumCtrl = new AlbumsController();
		$albums = $albumCtrl->search($key);
		$childsCtrl = new ChildsController();
		$childs = $childsCtrl->search($key);
		return view('search', ['key' => $key, 'childs' => $childs, 'albums' => $albums, 'users' => $users]);
	}
}
