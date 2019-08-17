<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

	/**
	 * Determine the type of user and redirect them to their dashboard.
	 * @param Request $request
	 * @param $user
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	protected function authenticated(Request $request, $user) {
		// Check if the user is an admin
		if (!$user->is_admin) {
			return redirect()->route('home');
		}

		return redirect()->route('admin.home');
	}
}
