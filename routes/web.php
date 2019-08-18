<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'prefix' => 'equipments',
	'as' => 'equipments.',
], function () {
	// Show equipments available
	Route::get('available', 'HomeController@showEquipments')->name('available');
	Route::post('available', 'HomeController@requestEquipment')->name('available');

	// Get user requests
	Route::get('requests', 'HomeController@myRequests')->name('requests');
});

Route::group([
	'prefix' => 'account',
	'as' => 'account.',
], function () {
	// Show the admin dashboard
	Route::get('password', 'SystemController@showPasswordForm')->name('password');
	Route::put('password', 'SystemController@updatePassword')->name('password');
});

/**
 * All the admin routes go here
 */
Route::group([
	'prefix' => 'admin',
	'as' => 'admin.',
], function () {
	// Show the admin dashboard
	Route::get('home', 'AdminController@index')->name('home');

	Route::resource('equipments', 'EquipmentController');

	Route::group([
		'prefix' => 'equipments',
		'as' => 'equipments.',
	], function () {
		Route::get('borrowing/requests', 'EquipmentController@borrowingRequests')->name('borrowing');
		Route::get('borrowing/requests/{id}', 'EquipmentController@viewBorrowingRequest')
			->name('borrowing.request');

		Route::post('borrowing/requests/{id}', 'EquipmentController@approveRequest')
			->name('borrowing.request');
	});
});