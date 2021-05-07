<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    public function editSite() {

        $contributors = collect(json_decode($data['contributors']));
        $contributors = $contributors->map(function($user_data) {
            return User::find($user_data['id']);
            // jeter une erreur si l'utilisateur existe pas
        });

        return view('home');
    }
}
