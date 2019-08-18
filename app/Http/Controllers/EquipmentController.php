<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Http\Requests\UploadCSVRequest;
use Illuminate\Http\Request;

class EquipmentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// Get the available equipment
		$equipments = Equipment::paginate(500, [
			'id', 'tag_number', 'class', 'description', 'serial_number', 'cost', 'nbv', 'location',
		]);

		return view('admin.equipments.index', compact('equipments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.equipments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UploadCSVRequest $request
	 * @return void
	 */
	public function store(UploadCSVRequest $request) {
		// Read the csv, convert it to csv
		$fileContents = SystemController::processCSVFiles($request->file('csv'));

		foreach ($fileContents as $fileContent) {
			$tagNo = $fileContent[0];
			$serialNo = $fileContent[3];

			// Check if the first index is numeric, removes the csv headers
			if (is_numeric($fileContent[0])) {
				$cost = is_numeric($fileContent[4]) ? $fileContent[4] : null;

				// Check if the equipment exists
				$existingEquipment = $this->existingTagAndSerialNo($tagNo, $serialNo);
				if (!$existingEquipment) {
					\DB::table('equipment')->insert([
						'tag_number' => $tagNo,
						'serial_number' => $serialNo,
						'class' => $fileContent[1],
						'description' => $fileContent[2],
						'cost' => $cost,
						'nbv' => $fileContent[5],
						'location' => $fileContent[6],
						'user_id' => $request->user()->id,
						'created_at' => now(),
						'updated_at' => now(),
					]);
				}
			}
		}
	}

	/**
	 * Find existing equipments
	 * @param int $tagNumber
	 * @param string $serialNumber
	 * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
	 */
	private function existingTagAndSerialNo(int $tagNumber, string $serialNumber) {
		return \DB::table('equipment')->where('tag_number', $tagNumber)
			->where('serial_number', $serialNumber)->first(['id']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
