<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function create(Request $request) {
		$resume = new User;

		$resume->fill($request->only([
			'address', 'educational_attainment'
		]));
	}
}
