<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Users to use in the system
		$users = [
			[
				'name' => 'Artisan',
				'department' => 'ict',
				'staff_number' => 'A/1234/14',
				'is_admin' => true,
			],
			[
				'name' => 'Grace',
				'email' => 'gee@test.com',
				'department' => 'ict',
				'staff_number' => 'A/1235/14',
				'is_admin' => false,
			],
		];

		foreach ($users as $user) {
			DB::table('users')->insert([
				'name' => ucwords($user['name']),
				'email' => strtolower($user['name'] . '@test.com'),
				'password' => bcrypt('secret'),
				'is_admin' => $user['is_admin'],
				'department' => $user['department'],
				'staff_number' => $user['staff_number'],
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
	}
}
