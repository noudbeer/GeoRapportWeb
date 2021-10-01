<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervention;
use App\Models\InterventionsGroup;
use App\Models\InterventionsType;
use App\Models\UnitOfTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterventionController extends Controller
{
    public function intervention(Request $request) {

        $user_id = Auth::user()->id;

        $this->validate($request,
            [
                'site_id' => 'required',
                'location' => 'required',
                'datetimeOfIntervention' => 'nullable',
                'teamMembers' => 'nullable',
                'interventionsGroup' => 'nullable',
                'type' => 'nullable',
                'quantity' => 'nullable',
                'unit' => 'nullable',
                'comment' => 'nullable',
                'timeSpent' => 'nullable',
                'unitOfTime' => 'nullable'
            ]
        );


        $date = null;
        if($request['datetimeOfIntervention'] != null) {
            $date = date("Y-m-d", strtotime(str_replace('/', '-', $request['datetimeOfIntervention'])));
        }
            
        // Transforming map of string / double to json
        $locations = str_replace('=', ':', $request['location']);
        $locations = str_replace('lat', '"lat"', $locations);
        $locations = str_replace('lng', '"lng"', $locations);
        
        $intervention = null;
        $intervention = Intervention::where('site_id', $request['site_id'])
            ->where('location', $locations)
            ->first();
        
        // Search in database some fields, if null then add them to database
        $group = null;
        if($request['interventionsGroup'] != null) {
            $group = InterventionsGroup::firstOrCreate(['name' => $request['interventionsGroup']]);
        }
        
        $type= null;
        if($request['type'] != null) {
            $type = InterventionsType::firstOrCreate(['name' => $request['type']]);
        }

        $unitOfTime = null;
        if($request['unitOfTime'] != null) {
            $unitOfTime = UnitOfTime::firstOrCreate(['name' => $request['unitOfTime']]);
        }
        
        if ($intervention == null) {
            Intervention::create([
                'site_id' => $request['site_id'],
                'location' => $locations,
                'owner_id' => $user_id,
                'datetimeOfIntervention' => $date,
                'teamMembers' => $request['teamMembers'],
                'interventionsGroup_id' => $group == null ? null : $group->id,
                'type_id' => $type == null ? null : $type->id,
                'quantity' => $request['quantity'],
                'unit' => $request['unit'],
                'comment' => $request['comment'],
                'timeSpent' => $request['timeSpent'],
                'unitOfTime_id' => $unitOfTime == null ? null : $unitOfTime->id
            ]);
        } else {
            $intervention->update([
                'datetimeOfIntervention' => $date,
                'teamMembers' => $request['teamMembers'],
                'interventionsGroup_id' => $group == null ? null : $group->id,
                'type_id' => $type == null ? null : $type->id,
                'quantity' => $request['quantity'],
                'unit' => $request['unit'],
                'comment' => $request['comment'],
                'timeSpent' => $request['timeSpent'],
                'unitOfTime_id' => $unitOfTime == null ? null : $unitOfTime->id
            ]);
        }

        return response()->json([], 204);
    }
}
