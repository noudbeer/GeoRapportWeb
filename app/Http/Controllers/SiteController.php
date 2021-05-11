<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    public function editSite(Request $request) {

        $owner = Auth::user();

        $contributors = collect(json_decode($request['contributors']));
        $contributors = $contributors->map(function($user_data) {
            if (User::find($user_data['id'] != null)
                return User::find($user_data['id']);
            else {
                // jeter une erreur si l'utilisateur existe pas
                echo "<script>console.log(Erreur lors de la recheche de l'utilisateur ". $contributors ) .")</script>";
            }
        });

        $points = collect(json_decode($request['']))

        // Champs à valider
		$fields = [
			'name'      => 'string',
			'owner'     => 'integer',
			'status'    => 'date_start',
		];
        $data = $request->validate($fields);

        return view('home');
    }
}
