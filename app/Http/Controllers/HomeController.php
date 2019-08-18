<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware([
			'auth', 'is_user',
		]);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		return view('home');
	}

	public function showEquipments() {
		// Get the available equipment
		$equipments = Equipment::where('is_available', true)->paginate(500, [
			'id', 'tag_number', 'description', 'serial_number', 'cost', 'nbv', 'location',
		]);

		return view('equipments.available', compact('equipments'));
	}

	public function requestEquipment(Request $request) {
		return $request;
	}
}
