<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 * @mixin \Eloquent
 */
class User extends Authenticatable {
	use Notifiable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'department', 'staff_number', 'is_admin',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'is_admin' => 'boolean',
	];

	/**
	 * Get the user borrowing requests
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function requests() {
		return $this->hasMany(Request::class);
	}
}
