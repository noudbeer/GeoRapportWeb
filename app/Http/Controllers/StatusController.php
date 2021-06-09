<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;


class StatusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    public function status() 
    {
        $status = collect();
		Status::all()->each(function($elem) use($status) {
			$status->push($elem);
		});

		return $status;
    }
}
