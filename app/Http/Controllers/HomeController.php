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
		// Extract the request data
		$user = $request->user();
		$equipmentID = $request->get('_id');

		try {
			// Check if the user has a pending request on the equipment
			$pendingRequest = \App\Request::whereIn('user_id', [$user->id])
				->where('is_processed', false)
				->where('equipment_id', $equipmentID)
				->first();

			if ($pendingRequest) {
				return redirect()->back()->with('error', sprintf(
						"You have a pending request on %s. Please wait for approval.", $request->get('_name'))
				);
			}

			// Create the borrowing request
			\App\Request::create([
				'user_id' => $request->user()->id,
				'equipment_id' => $equipmentID,
			]);
		} catch (\Exception $exception) {
			return redirect()->back()->with('error', 'Something went wrong. Please try again.');
		}

		return redirect()->back()->with('success', 'Request placed successfully.');
	}

	/**
	 * Load the user borrowing requests
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function myRequests(Request $request) {
		$requests = \App\Request::with('equipment:id,tag_number,description')
			->where('user_id', $request->user()->id)
			->paginate('500', [
				'id', 'is_processed', 'user_id', 'created_at', 'equipment_id', 'returns_at', 'is_returned',
			]);

		return view('equipments.requests', compact('requests'));
	}
}
