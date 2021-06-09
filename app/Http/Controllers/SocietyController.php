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

    public function societies() 
    {
		$societies = collect();
		Society::all()->each(function($society) use($societies) {
			$societies->push($society);
		});

		return $societies;
	}
}
