<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Request
 * @package App
 * @mixin \Eloquent
 */
class Request extends Model {
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'is_processed', 'user_id', 'equipment_id', 'processed_by', 'is_returned', 'returns_at',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'is_available' => 'boolean',
	];

	/**
	 * Get the user who made the request
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	/**
	 * Get the equipment data
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function equipment() {
		return $this->belongsTo(Equipment::class, 'equipment_id');
	}
}
