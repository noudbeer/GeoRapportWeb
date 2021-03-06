<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;

class SocietyController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    public function societies() {
		return Society::all();
	}
}
