<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EquipmentCSVProcessor implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	/**
	 * @var array
	 */
	private $fileContents;
	/**
	 * @var int
	 */
	private $userID;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct(array $fileContents, int $userID) {
		//
		$this->fileContents = $fileContents;
		$this->userID = $userID;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle() {
		foreach ($this->fileContents as $fileContent) {
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
						'user_id' => $this->userID,
						'created_at' => now(),
						'updated' => now(),
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
}
