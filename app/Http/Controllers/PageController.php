<?php

namespace App\Http\Controllers;

class PageController extends Controller {
	/**
	 * Show the index page
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return view('welcome');
	}
}
