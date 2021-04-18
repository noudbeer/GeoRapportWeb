<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    public function newSite() {
        return view('home');
    }
}
