<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\RegisterRequests;
use App\Http\Requests\LoginRequests;
//use App\Http\Requests\Request;
use App\Parents;
use Hash;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
	
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	// public function getregister()
	// {
	// 	return view('auth.register');
	// }
	// public function postregister(RegisterRequests $request)
	// {
	// 	//echo $request;
	// 	$parent = new Parents();
	// 	$parent->email = $request->email;
	// 	$parent->password = Hash::make($request->txtpassword);
	// 	$parent->fullname = $request->name;
	// 	$parent->save();
	// 	return redirect()->action('ParentsController@getlist');
	// }
	// public function getlogin()
	// {
	// 	return view('auth.login');
	// }
	// public function postlogin(LoginRequests $request)
	// {
	// 	$auth = array(	'email' => $request->email,
	// 					'password' => $request->password
	// 				);
	// 	if ($this->auth->attempt($auth))
	// 	{
	// 		echo $this->auth->user()->fullname;	}
	// 		else{
	// 			echo "Thất bại";
	// 		}
	// }
	// /*protected function validator(array $data)
 //    {
 //        return Validator::make($data, [
 //            'name' => 'required|max:255',
 //            'email' => 'required|email|max:255|unique:users',
 //            'password' => 'required|min:6|confirmed',
 //        ]);
 //    }*/

 //    /**
 //     * Create a new user instance after a valid registration.
 //     *
 //     * @param  array  $data
 //     * @return User
 //     */
 //   /* protected function create(array $data)
 //    {
 //        return User::create([
 //            'name' => $data['name'],
 //            'email' => $data['email'],
 //            'password' => bcrypt($data['password']),
 //        ]);
 //    }*/
}
