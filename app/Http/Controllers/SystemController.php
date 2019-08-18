<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;

class SystemController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware([
			'auth',
		]);
	}

	/**
	 * Show the form for changing the user password
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showPasswordForm() {
		return view('account.password');
	}

	/**
	 * Process the request for changing the user password
	 * @param UpdatePasswordRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function updatePassword(UpdatePasswordRequest $request) {
		// Extract the request data
		$currentPassword = $request->input('current_password');
		$newPassword = $request->input('password');

		// Get the auth user data
		$user = $request->user();

		// Check if the password entered matches the current password
		if (!\Hash::check($currentPassword, $user->password)) {
			return redirect()->back()->with('error', 'The entered password does not match our records.');
		}

		// Check if the new password is same as the old password
		if (strcasecmp($newPassword, $currentPassword) == 0) {
			return redirect()->back()->with('error', 'The new password cannot be the same as the current password.');
		}

		// Update the user password
		$user->update([
			'password' => \Hash::make($newPassword),
		]);


		return redirect()->back()->with('success', 'Your account password has been successfully changed.');
	}

	/**
	 * Here we process the csv file uploaded. We will convert it to an array
	 * @param object $file
	 * @return bool|false|string|string[]|null
	 */
	public static function processCSVFiles(object $file) {
		return mb_convert_encoding(array_map('str_getcsv', file($file->getRealPath())), 'UTF-8', 'UTF-8');
	}
}
