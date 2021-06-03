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
        // OWNER
        $request['owner_id'] = auth()->user()->id;
        

        // CLIENT
        $client = $request['client'];
        var_dump($client);
        $society = Society::where('name', $client)->get()->first(); // search the society $request['client] in bdd
        
        // If society dosen't excite in bdd
        if($society == null) {
            Society::create(['name' => $client]);
            $society = Society::where('name', $client)->get()->first();
        }

        $request['client_id'] = $society->id; 
        

        // IS ZONE
        if($request['isZone'] == 'on')
            $request['isZone'] = true;
        else
            $request['isZone'] = false;



        //CONTROLERS
        $controllers = collect(json_decode($request['controllers']));
        $controllers = $controllers->map(function($user_data) {
            $user = User::find($user_data->id);
            if($user != null)
                return $user;
            else {
                // jeter une erreur si l'utilisateur existe pas
                trigger_error("Erreur lors de la recheche de l'utilisateur ". $user_data);
            }
        });

        
        // CONTRIBUTORS
        $contributors = collect(json_decode($request['contributors']));
        $contributors = $contributors->map(function($user_data) {
            $user = User::find($user_data->id);
            if($user != null)
                return $user;
            else {
                // jeter une erreur si l'utilisateur existe pas
                trigger_error("Erreur lors de la recheche de l'utilisateur ". $user_data);
            }
        });


        // END
        if( $request['status_id'] == Status::where('name', 'cloturé')->first()->id )
            $request['end'] = new \DateTime;


        // Champs à valider
		$fields = [
            'owner_id'    => 'required|integer',
			'name'        => 'required|string',
            'orderNumber' => 'required|integer',
            'client_id'   => 'required|integer',
            'isZone'      => 'required|boolean',
            'points'      => 'required|json',
            'beginning'   => 'required|date',
			'status_id'   => 'required|integer',
            'end'         => 'date'
		];

        $data = $request->validate($fields);

        $site = Site::create($data);

        // Controllers attachement
        foreach($controllers as $user)
            $user->controls()->attach($site->id);

        // Contributors attachement
        foreach($controllers as $user)
            $user->contributions()->attach($site->id);

        return redirect('map');
    }
}
