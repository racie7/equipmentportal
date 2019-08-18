<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('equipment', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('tag_number');
			$table->string('class');
			$table->text('description');
			$table->string('serial_number')->unique();
			$table->unsignedBigInteger('cost')->nullable();
			$table->unsignedBigInteger('nbv');
			$table->string('location');
			$table->boolean('is_available')->default(true);
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('equipment');
	}
}
