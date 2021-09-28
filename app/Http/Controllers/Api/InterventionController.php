<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervention;
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
                'interventionsGroup_id' => 'nullable',
                'type_id' => 'nullable',
                'quantity' => 'nullable',
                'unit' => 'nullable',
                'comment' => 'nullable',
                'timeSpent' => 'nullable',
                'unitOfTime_id' => 'nullable'
            ]
        );

        $date = date("Y/m/d H:i:s", strtotime($request['datetimeOfIntervention']));

        $intervention = Intervention::where('site_id', $request['site_id'])
            ->where('location', $request['location'])
            ->first();
        
        if ($intervention == null && $request['site_id']) {
            Intervention::create([
                'site_id' => $request['site_id'],
                'location' => $request['location'],
                'owner_id' => $user_id,
                'datetimeOfIntervention' =>$date,
                'teamMembers' => $request['teamMembers'],
                'interventionsGroup_id' => $request['interventionsGroup_id'],
                'type_id' => $request['type_id'],
                'quantity' => $request['quantity'],
                'unit' => $request['unit'],
                'comment' => $request['comment'],
                'timeSpent' => $request['timeSpent'],
                'unitOfTime_id' => $request['unitOfTime_id']
            ]);
        } else {
            Intervention::where('site_id', $request['site_id'])
            ->where('location', $request['location'])
            ->update([
                'datetimeOfIntervention' => $date,
                'teamMembers' => $request['teamMembers'],
                'interventionsGroup_id' => $request['interventionsGroup_id'],
                'type_id' => $request['type_id'],
                'quantity' => $request['quantity'],
                'unit' => $request['unit'],
                'comment' => $request['comment'],
                'timeSpent' => $request['timeSpent'],
                'unitOfTime_id' => $request['unitOfTime_id']
            ]);
        }

        // return response()->json([], 200);
        return response()->json([], 204);
    }
}
