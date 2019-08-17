<?php

namespace App\Http\Middleware;

use Closure;

class IsUser {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		// Get the current auth user
		$user = $request->user();

		// Check if the user is an admin
		if ($user->is_admin) {
			return redirect()->route('admin.home');
		}

		return $next($request);
	}
}
