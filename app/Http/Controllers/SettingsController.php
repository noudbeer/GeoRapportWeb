<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware(['verified']);
	}

    public function index() {
        $user = auth()->user();

        return view('settings', compact('user'));
    }
}
