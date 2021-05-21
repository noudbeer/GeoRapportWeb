<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Society;
use App\Models\Site;
use App\Models\Status;

class SiteController extends Controller
{
    public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    public function editSite(Request $request) {

        $owner = auth()->user();

        
        $client = $request['client'];
        $society = Society::where('name', $client)->get()->first();
        //Check si la societé indiqué dans le champ existe déjà
        if($society == null)
            $society = Society::create(['name' => $client])->get()->first();

        $request['client'] = $society->id;
        
        if($request['isZone'] == 'on')
            $request['isZone'] = true;
        else
            $request['isZone'] = false;

        
        $contributors = collect(json_decode($request['contributors']));
        $contributors = $contributors->map(function($user_data) {
            $user = User::find($user_data['id']);
            if($user != null)
                return $user;
            else {
                // jeter une erreur si l'utilisateur existe pas
                trigger_error("Erreur lors de la recheche de l'utilisateur ". $user_data);
            }
        });

        $points = collect(json_decode($request['points']));

        // Champs à valider
		$fields = [
			'name'        => 'required|string',
            'orderNumber' => 'required|integer',
            'client'      => 'required|integer',
            'isZone'      => 'required|boolean',
            'beginning'   => 'required|date',
			'status'      => 'required|integer',
		];

        $data = $request->validate($fields);
        $data['owner'] = $owner->id;

        if( $data['status'] == Status::where('name', 'cloturé')->first()->id )
            $data['end'] = new \DateTime;

        $site = Site::create($data);

        return redirect('map');
    }
}
