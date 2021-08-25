<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Society;
use App\Models\Site;
use App\Models\Status;
use App\Http\Resources\SiteResource;

class SiteController extends Controller
{
    public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    /**
     * Return all sites 
     */
    public function getSites() {
        return SiteResource::collection(Site::all());
    }
    
    public function editSite(Request $request) {

        // OWNER
        $request['owner_id'] = auth()->user()->id;
        

        // CLIENT
        $client = $request['client'];
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



        //VALIDATORS
        $validators = collect(json_decode($request['validators']));
        $validators = $validators->map(function($user_data) {
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
        // TODO: à revoir si on ajoute la modification de chantier
		$fields = [
            'owner_id'    => 'required|integer',
            'client_id'   => 'required|integer',
			'order_title' => 'string|nullable',
            'orderNumber' => 'string|nullable',
            'cpd_title'   => 'string|nullable',
            'cpdNumber'   => 'string|nullable',
            'isZone'      => 'required|boolean',
            'points'      => 'required|json',
            'beginning'   => 'date|nullable',
			'status_id'   => 'required|integer',
            'end'         => 'date'
		];

        $data = $request->validate($fields);

        $site = Site::create($data);

        // Validators attachement
        foreach($validators as $user)
            $user->controls()->attach($site->id);

        // Contributors attachement
        foreach($contributors as $user)
            $user->contributions()->attach($site->id);

        return redirect('map');
    }
}
